<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use OpenApi\Generator;
use common\models\Permission;
use common\models\Role;
use common\models\RolePermission;
use Throwable;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="TFUZB API",
 *     description="TFUZB Swagger hujjatlari"
 * )
 *
 * @OA\Server(
 *     url="http://127.0.0.1:8183",
 *     description="Local API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
class SwaggerController extends Controller
{
    public function actionJson(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        try {
            // Swagger hujjatlarini to‘plash
            $openapi = Generator::scan([
                Yii::getAlias('@api/modules/v1/controllers'),
                Yii::getAlias('@common/models'),
            ]);

            $json = json_decode($openapi->toJson(), true);

            // Creator rolini olish
            $creatorRole = Role::findOne(['name' => 'creator']);
            if (!$creatorRole) {
                throw new \Exception("'creator' roli topilmadi. Iltimos, role jadvalidan tekshiring.");
            }

            // User rolini olish
            $userRole = Role::findOne(['name' => 'user']);
            if (!$userRole) {
                throw new \Exception("'user' roli topilmadi. Iltimos, role jadvalidan tekshiring.");
            }

            // Controllerlardan requirePermission('...') chaqiruvlarini topamiz
            $permissions = $this->extractRequirePermissions(Yii::getAlias('@api/modules/v1/controllers'));

            foreach ($permissions as $permName) {
                $permName = self::slugify($permName);

                try {
                    $permission = Permission::findOne(['name' => $permName]);
                    if (!$permission) {
                        $permission = new Permission();
                        $permission->name = $permName;
                        $permission->created_at = time();
                        $permission->updated_at = time();
                        if (!$permission->save(false)) {
                            Yii::error("Permission saqlanmadi: $permName | " . json_encode($permission->getErrors()), __METHOD__);
                            continue;
                        }
                    }

                    if (!RolePermission::find()->where([
                        'role_id' => $creatorRole->id,
                        'permission_id' => $permission->id
                    ])->exists()) {
                        $rp = new RolePermission();
                        $rp->role_id = $creatorRole->id;
                        $rp->permission_id = $permission->id;
                        $rp->save(false);
                    }

                } catch (Throwable $permError) {
                    $json['paths']['/_swagger_error']['permission_' . $permName] = [
                        'summary' => "Xatolik: $permName",
                        'description' => $permError->getMessage(),
                        'file' => $permError->getFile(),
                        'line' => $permError->getLine(),
                    ];
                }
            }

            // 🚀 Qo‘shimcha: User uchun 4 ta permission yaratamiz
            $userPermissions = [
                'can_view_profile_me',
                'can_reset_password_me',
                'can_update_profile_me',
                'can_upload_avatar_me',
            ];

            foreach ($userPermissions as $permName) {
                try {
                    $permission = Permission::findOne(['name' => $permName]);
                    if (!$permission) {
                        $permission = new Permission();
                        $permission->name = $permName;
                        $permission->created_at = time();
                        $permission->updated_at = time();
                        if (!$permission->save(false)) {
                            Yii::error("User permission saqlanmadi: $permName | " . json_encode($permission->getErrors()), __METHOD__);
                            continue;
                        }
                    }

                    if (!RolePermission::find()->where([
                        'role_id' => $userRole->id,
                        'permission_id' => $permission->id
                    ])->exists()) {
                        $rp = new RolePermission();
                        $rp->role_id = $userRole->id;
                        $rp->permission_id = $permission->id;
                        $rp->save(false);
                    }
                } catch (Throwable $userPermError) {
                    $json['paths']['/_swagger_error']['user_permission_' . $permName] = [
                        'summary' => "Xatolik (user permission): $permName",
                        'description' => $userPermError->getMessage(),
                        'file' => $userPermError->getFile(),
                        'line' => $userPermError->getLine(),
                    ];
                }
            }

            return $json;

        } catch (Throwable $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => explode("\n", $e->getTraceAsString())
            ];
        }
    }


    public function actionUi(): string
    {
        return $this->render('@app/web/swagger/index');
    }

    private static function slugify(string $text): string
    {
        $text = preg_replace('/[^a-z0-9_]+/', '_', strtolower($text));
        return trim($text, '_');
    }

    private function extractRequirePermissions(string $controllerPath): array
    {
        $permissions = [];
        $directory = new RecursiveDirectoryIterator($controllerPath);
        $iterator = new RecursiveIteratorIterator($directory);
        $regex = new RegexIterator($iterator, '/^.+\.php$/i', RegexIterator::GET_MATCH);

        foreach ($regex as $files) {
            foreach ($files as $file) {
                $content = file_get_contents($file);
                preg_match_all('/\$this->requirePermission\s*\(\s*[\'"]([^\'"]+)[\'"]\s*\)/', $content, $matches);
                if (!empty($matches[1])) {
                    foreach ($matches[1] as $perm) {
                        $permissions[] = $perm;
                    }
                }
            }
        }

        return array_unique($permissions);
    }
}
