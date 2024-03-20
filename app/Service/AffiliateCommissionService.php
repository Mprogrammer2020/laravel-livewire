<?php

namespace App\Service;

use App\Models\AffiliateCommission;
use Exception;

/**
 *
 * @author netset
 */
trait AffiliateCommissionService {

    /**
     * save the affiliate commission
     * @param type $request
     * @return type
     */
    public function saveAffiliateCommission($request) {
        try {
//            dd($request->all());
            $affiliateCommissionObj = new AffiliateCommission();
            $affiliateCommissionObj->user_id = $request->user_id;
            $affiliateCommissionObj->order_id = $request->order_id;
            $affiliateCommissionObj->commission_amount = $request->commission_amount;
            $affiliateCommissionObj->save();
            if ($affiliateCommissionObj->id > 0) {
                return [true, $affiliateCommissionObj];
            }
            return [false, 'Can not add the commission'];
        } catch (Exception $ex) {
            return [false, $ex->getMessage()];
        }
    }

}
