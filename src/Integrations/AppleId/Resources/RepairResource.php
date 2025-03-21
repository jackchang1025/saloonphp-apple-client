<?php

namespace Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Resources;

use Saloon\Exceptions\Request\RequestException;
use Weijiajia\SaloonphpAppleClient\Exception\Phone\PhoneException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeException;
use Weijiajia\SaloonphpAppleClient\Integrations\BaseResource;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Repair\Options;
use Weijiajia\SaloonphpAppleClient\Response\Response;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Response\AccountManager\Repair\Repair as RepairResponse;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Repair\Repair as RepairData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Repair\Repair as RepairRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Repair\Verify\Phone as PhoneRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Repair\Verify\Phone as PhoneData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\AccountManage\Repair\Verify\Phone\SecurityCode as SecurityCodeRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Dto\Request\Repair\Verify\Phone\SecurityCode as SecurityCodeData;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Widget\Account\Repair as WidgetRepairRequest;
use Weijiajia\SaloonphpAppleClient\Integrations\AppleId\Request\Payment\verify\Standard as StandardRequest;
use Saloon\Exceptions\Request\ClientException;
use Saloon\Exceptions\Request\Statuses\InternalServerErrorException;
use Weijiajia\SaloonphpAppleClient\Exception\VerificationCodeSentTooManyTimesException;
class RepairResource extends BaseResource
{
    /**
     * @param string $widgetKey
     * @param string $sessionId
     * @return Response
     * @throws ClientException
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function options(string $widgetKey,string $sessionId):Response
    {
        try{

            return $this->connector->send(new Options($widgetKey,$sessionId));;

        }catch(ClientException $e){

            $response = $e->getResponse();

            if($response->status() === 454){

                $location = $response->headers()->get('Location');
                if($location === null){
                    throw new \InvalidArgumentException('get location failed');
                }

                $this->verifyPayment($location,$widgetKey,$sessionId);

                return $this->connector->send(new Options($widgetKey,$sessionId));;
            }
            throw $e;
        }
    }

    /**
     * @param RepairData $data
     * @param string $widgetKey
     * @param string $sessionId
     * @return RepairResponse
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function repair(RepairData $data,string $widgetKey,string $sessionId):RepairResponse
    {
        try{

            return $this->connector->send(new RepairRequest($data,$widgetKey,$sessionId))->dto();

        }catch(InternalServerErrorException  $e){

            return $e->getResponse()->dto();
        }
    }

    /**
     * @param PhoneData $data
     * @param string $widgetKey
     * @param string $sessionId
     * @return RepairResponse
     * @throws VerificationCodeSentTooManyTimesException
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException|PhoneException
     */
    public function verifyPhone(PhoneData $data,string $widgetKey,string $sessionId):RepairResponse
    {
        try{

            return $this->connector->send(new PhoneRequest($data,$widgetKey,$sessionId))->dto();
        }catch(ClientException  $e){

             $response = $e->getResponse();

            if($response->status() === 423){
                throw new VerificationCodeSentTooManyTimesException($response->body());
            }

            if($response->status() === 400){
                //Verification codes can’t be sent to this phone number at this time. Please try again later.
                throw new PhoneException($response->body());
            }
            throw $e;
        }
    }

    /**
     * @param SecurityCodeData $data
     * @param string $widgetKey
     * @param string $sessionId
     * @return RepairResponse
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException|VerificationCodeException
     */
    public function verifySecurityCode(SecurityCodeData $data,string $widgetKey,string $sessionId):RepairResponse
    {
        try {

            return $this->connector->send(new SecurityCodeRequest($data,$widgetKey,$sessionId))->dto();

        } catch (RequestException $e) {

            $response = $e->getResponse();

            if ($response->status() === 400) {
                throw new VerificationCodeException($response->body());
            }

            throw $e;
        }
    }

    /**
     * @param string $widgetKey
     * @return Response
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function widgetRepair(string $widgetKey):Response
    {
        return $this->connector->send(new WidgetRepairRequest($widgetKey));
    }

    /**
     * @param string $location
     * @param string $widgetKey
     * @param string $sessionId
     * @return Response
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function verifyPayment(string $location,string $widgetKey,string $sessionId):Response
    {
        return $this->connector->send(new StandardRequest($location,$widgetKey,$sessionId));
    }
}
