<?php

namespace App\Tool\SMS;
use App\Tool\M3Result;

class SendTemplateSMS
{
  //主帐号
  private $accountSid='8a48b5515018a0f4015036b840d12e6d';

  //主帐号Token
  private $accountToken='c4a9a12791f14e03bf5662012a63ab0e';

  //应用Id
  private $appId='aaf98f8950189e9b015036b881441007';

  //请求地址，格式如下，不需要写https://
  private $serverIP='sandboxapp.cloopen.com';

  //请求端口
  private $serverPort='8883';

  //REST版本号
  private $softVersion='2013-12-26';

  /**
    * 发送模板短信
    * @param to 手机号码集合,用英文逗号分开
    * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
    * @param $tempId 模板Id
    */
  public function sendTemplateSMS($to,$datas,$tempId)
  {
      $M3Result =  new M3Result();
      // 初始化REST SDK
      $rest = new CCPRestSDK($this->serverIP,$this->serverPort,$this->softVersion);
      $rest->setAccount($this->accountSid,$this->accountToken);
      $rest->setAppId($this->appId);

      // 发送模板短信
      $result = $rest->sendTemplateSMS($to,$datas,$tempId);
      if($result == NULL ) {
          $M3Result->status = 3;
          $M3Result->message = 'result error!';
      }
      if($result->statusCode!=0) {
          $M3Result->status = $result->statusCode;
          $M3Result->message = $result->statusMsg;
      }else{
          $M3Result->status = 0;
          $M3Result->message = '发送成功';

      }

      return $M3Result;
  }
}

//sendTemplateSMS("18576437523", array(1234, 5), 1);
