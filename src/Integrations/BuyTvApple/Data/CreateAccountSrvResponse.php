<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\BuyTvApple\Data;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;

class CreateAccountSrvResponse extends Data
{
    //{
//     "status": 0,
//     "requiresStoreFrontResponseHeader": "true",
//     "result": {
//         "accountId": "360000257288518",
//         "xt-b-ts-22231905520": {
//             "isSecure": false,
//             "value": "1742226038684",
//             "domain": ".apple.com",
//             "path": "/",
//             "isHTTPOnly": false
//         },
//         "mz_at_ssl-22231905520": {
//             "isSecure": true,
//             "value": "AwUAAAFQAAFgWAAAAABn2EJ2j6VPoyhw0wBTVqYgQth6SgL2His%3D",
//             "domain": ".apple.com",
//             "path": "/",
//             "isHTTPOnly": true
//         },
        /**  "details": "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>\n<!DOCTYPE plist PUBLIC \"-//Apple Computer//DTD PLIST 1.0//EN\" \"http://www.apple.com/DTDs/PropertyList-1.0.dtd\">\n<plist version=\"1.0\">\n<dict>\n  <key>set-current-user</key>\n  <dict>\n    <key>passwordToken</key><string>2F7719CAF48A7A1F5BC26546A0F67E91</string>\n    <key>clearToken</key><string>30303030303031373432323236303337</string>\n    <key>accountInfo</key>\n    <dict>\n      <key>appleId</key><string>carolgarciaube@gmail.com</string>\n      <key>address</key>\n      <dict>\n        <key>firstName</key><string>Jack</string>\n        <key>lastName</key><string>Chang</string>\n      </dict>\n    </dict>\n    <key>dsPersonId</key><string>22231905520</string>\n    <key>altDsid</key><string>000944-08-85718c67-57b3-4a7f-942d-db79b00beed3</string>\n    <key>jingleDocType</key><string>signupSuccess</string>\n    <key>jingleAction</key><string>mzSignupAccount</string>\n    <key>creditDisplay</key><string></string>\n    <key>creditBalance</key><string>1311811</string>\n    <key>freeSongBalance</key><string>1311811</string>\n    <key>store-version</key><string>2.0</string>\n  </dict>\n</dict>\n</plist>\n", */
//         "mz_at0-22231905520": {
//             "isSecure": false,
//             "value": "AwQAAAFQAAFgWAAAAABn2EJ2Jqr1wBHtcujXvS5Tsaa%2FBVabWFA%3D",
//             "domain": ".apple.com",
//             "path": "/",
//             "isHTTPOnly": true
//         },
//         "dsPersonId": "22231905520"
//     }
// }

    public function __construct(
        public int $status,
        public ?array $result = null,
        public ?string $requiresStoreFrontResponseHeader = null,
    ) {
    }
}