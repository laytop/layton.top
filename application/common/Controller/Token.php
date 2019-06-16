<?php
namespace app\common\controller;

class Token
{
      //根据用户id，用户名称，域名前缀，有效时间来生成token
      public static function getToken()
      {
           return  hash_hmac ('md5','123', self::keyToken());
      }

      //根据用户id，用户名称，域名前缀，有效时间验证token的合法性
      public static function isToken()
      {

      }

      //密钥（私密）
      private static function keyToken()
      {
          $key = "AAAAB3NzaC1yc2EAAAADAQABAAABAQCVHb7l1fu+zbCZDG3n//EPpDP3WmsaQbtW+f9rsKMUMs7bmniNGUkvzu+X+DK63d6FMqmclbrSfgsFPEPawMdJDpq+so7NXYWEdCKsYqikJ3hBmdLgA/HbBizK8QEduSNAMf4AGyPMkkiSSur0JPRzw1XKnCMYUq4xQiIvtW+khGNZlv57GTQTexbLm5kcW2T76zEIFKbHPTrucMCEDBhkwCO4J3nXZ9/BXr1Ae7FQ5YC21Grwgmym19A0aLdaHWeq0KiH2KkgfLv2n3Bvw9sGD9re5WNnuuOtXYZJ5LPQdwwCBM3CCet7w7X+YZLsyuwq6EzvA2h1SB8dYTfUk2lB 1240847112@example.com";
          return $key;
      }
}