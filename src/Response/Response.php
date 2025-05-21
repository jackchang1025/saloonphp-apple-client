<?php

/**
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Weijiajia\SaloonphpAppleClient\Response;

class Response extends \Saloon\Http\Response
{
    use HasServiceError;
    use HasAuth;
    use HasPhoneNumbers;
    use XmlResponseHandler;
}
