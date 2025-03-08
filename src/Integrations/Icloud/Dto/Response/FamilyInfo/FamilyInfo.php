<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\Icloud\Dto\Response\FamilyInfo;

use Illuminate\Database\Eloquent\Model;
use Weijiajia\SaloonphpAppleClient\DataConstruct\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\DataCollection;


class FamilyInfo extends Data
{
    public function __construct(
        #[MapName('status-message')]
        public string $statusMessage,
        public ?int $status = null,
        public ?string $title = null,
        public array $familyInvitations = [],
        public array $outgoingTransferRequests = [],
        public bool $isMemberOfFamily = false,
        public ?Family $family = null,
        #[DataCollectionOf(FamilyMember::class)]
        public ?DataCollection $familyMembers = null,
        public bool $showAddMemberButton = true,
    ) {
    }

    public function updateOrCreate(): ?\App\Models\Family
    {
        if (!$this->family) {
            return null;
        }

        return \App\Models\Family::updateOrCreate(
            ['family_id' => $this->family->familyId],
            [
                'organizer'                  => $this->family->organizer,
                'etag'                       => $this->family->etag,
                'transfer_requests'          => $this->family->transferRequests,
                'invitations'                => $this->family->invitations,
                'outgoing_transfer_requests' => $this->family->outgoingTransferRequests,
            ]
        );
    }

    public function updateOrCreateFamilyMembers(string|int $familyId): void
    {
        if ($this->familyMembers) {
            foreach ($this->familyMembers as $memberData) {
                \App\Models\FamilyMember::updateOrCreate(
                    [
                        'family_id' => $familyId,
                        'apple_id'  => $memberData->appleId,
                    ],
                    [
                        'last_name'                                => $memberData->lastName,
                        'dsid'                                     => $memberData->dsid,
                        'original_invitation_email'                => $memberData->originalInvitationEmail,
                        'full_name'                                => $memberData->fullName,
                        'age_classification'                       => $memberData->ageClassification,
                        'apple_id_for_purchases'                   => $memberData->appleIdForPurchases,
                        'first_name'                               => $memberData->firstName,
                        'dsid_for_purchases'                       => $memberData->dsidForPurchases,
                        'has_parental_privileges'                  => $memberData->hasParentalPrivileges,
                        'has_screen_time_enabled'                  => $memberData->hasScreenTimeEnabled,
                        'has_ask_to_buy_enabled'                   => $memberData->hasAskToBuyEnabled,
                        'has_share_purchases_enabled'              => $memberData->hasSharePurchasesEnabled,
                        'has_share_my_location_enabled'            => $memberData->hasShareMyLocationEnabled,
                        'share_my_location_enabled_family_members' => $memberData->shareMyLocationEnabledFamilyMembers,
                    ]
                );
            }
        }
    }

    public function isFamilyOrganizer(string $dsid): bool
    {
        return $dsid === $this->family?->organizer;
    }
}
