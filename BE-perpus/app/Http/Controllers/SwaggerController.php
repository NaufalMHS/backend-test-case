namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Library API",
 *     version="1.0.0",
 *     description="API documentation for the Library system",
 *     @OA\Contact(
 *         email="support@library.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
class SwaggerController extends BaseController
{
    // This can be an empty class or you can use it to add global annotations
}
