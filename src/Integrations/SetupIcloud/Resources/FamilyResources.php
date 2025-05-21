<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\AddFamilyMember\AddFamilyMember;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\CreateFamily\CreateFamily;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Request\VerifyCVV\VerifyCVV;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyDetails\FamilyDetails;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\FamilyInfo\FamilyInfo;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\ITunesAccountPaymentInfo\ITunesAccountPaymentInfo;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\leaveFamily\leaveFamily;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Dto\Response\VerifyCVV\VerifyCVV as VerifyCVVResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\AddFamilyMemberRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\CreateFamilyRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\GetFamilyDetailsRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\GetITunesAccountPaymentInfoRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\GetMaxFamilyDetailsRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\LeaveFamilyRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\RemoveFamilyMemberRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\SetupIcloud\Request\VerifyCVVRequest;

class FamilyResources extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFamilyDetailsRequest(): FamilyDetails
    {
        return $this->getConnector()
            ->send(new GetFamilyDetailsRequest())
            ->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createFamilyRequest(CreateFamily $createFamilyRequestData): FamilyInfo
    {
        return $this->getConnector()
            ->send(new CreateFamilyRequest($createFamilyRequestData))
            ->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function leaveFamilyRequest(): leaveFamily
    {
        return $this->getConnector()
            ->send(new LeaveFamilyRequest())
            ->dto()
        ;
    }

    /**
     * 发起添加家庭成员的请求
     *
     * 此方法用于向Apple账户服务发送一个添加新家庭成员的请求它需要家庭成员的Apple ID、密码和验证令牌，
     * 以及两个可选的布尔参数，用于控制新成员是否默认启用位置共享和购买内容共享
     *
     * @param AddFamilyMember $data 包含家庭成员Apple ID、密码和验证令牌的AddFamilyMemberData对象
     *
     * @return FamilyInfo 返回发送请求后的响应对象
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function addFamilyMemberRequest(AddFamilyMember $data): FamilyInfo
    {
        return $this->getConnector()
            ->send(
                new AddFamilyMemberRequest($data)
            )->dto()
        ;
    }

    public function removeFamilyMemberRequest(int|string $dsid): FamilyInfo
    {
        return $this->getConnector()
            ->send(
                new RemoveFamilyMemberRequest($dsid)
            )->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function verifyCVVRequest(VerifyCVV $data): VerifyCVVResponse
    {
        return $this->getConnector()
            ->send(
                new VerifyCVVRequest($data)
            )->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getMaxFamilyDetailsRequest(): FamilyInfo
    {
        return $this->getConnector()
            ->send(
                new GetMaxFamilyDetailsRequest()
            )->dto()
        ;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getITunesAccountPaymentInfoRequest(
        string $organizerDSID,
        string $userAction = 'ADDING_FAMILY_MEMBER',
        bool $sendSMS = true
    ): ITunesAccountPaymentInfo {
        return $this->getConnector()->send(
            new GetITunesAccountPaymentInfoRequest($organizerDSID, $userAction, $sendSMS)
        )->dto();
    }
}
