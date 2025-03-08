<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\LoginDelegates\Ids;

use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Weijiajia\SaloonphpAppleClient\Helpers\CustomSnakeCaseMapper;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\DataCollection;

#[MapName(CustomSnakeCaseMapper::class)]
class ServiceData extends Data
{

    public function __construct(

        public string $profileId,
        #[DataCollectionOf(Handles::class)]
        public ?DataCollection $handles = null,
        public ?string $emailAddress = null,
        public ?string $authToken = null,
        public ?array $selfHandle = null,
        public ?InvitationContext $invitationContext = null,
        public ?string $realmUserId = null,
        public ?string $appleId = null,
    ) {
    }
}
