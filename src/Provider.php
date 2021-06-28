<?

namespace Wails\Core;
use League\OAuth2\Client\Provider\GenericProvider;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

final class Provider
{

    private static function new(string $provider)
    {

        return new GenericProvider(Config::get('providers', true)[$provider]);

    }

    public static function url(string $provider)
    {

        return self::new($provider)->getAuthorizationUrl();

    }

    public static function access(string $provider, mixed $type, array $format)
    {

        return self::new($provider)->getAccessToken($type, $format);

    }

    public static function Microsoft()
    {

        return ((new Graph())->setAccessToken(
            self::access('microsoft',
            'authorization_code', array(
                'code' => $_GET['code']
            )
        )->getToken()))->createRequest('GET', '/me')
            ->setReturnType(Model\User::class)
            ->execute();

    }

}