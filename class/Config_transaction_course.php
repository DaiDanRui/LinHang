<?php
/**
 * id	订单流水号 	BIGINT	主键		AI
choose_id/
reward_id	课程ID/悬赏ID	BIGINT			
state	订单状态（0选择 1拍下,2付款,3退款）	tinyint			
payer_id	付款方ID	BIGINT			
seller_id	收款方ID	BIGINT			
price	金额	FLOAT(7,3)			
date_choose	拍下日期	DATETIME			
date_pay	确认日期	DATETIME		can be null	
payer_account_type	买方账户类型		can be null		
payer_account	买方账户	VARCHAR(40)	can be null		
seller_account_type	卖方账户类型			can be null	
seller_account	卖方账户	VARCHAR（40）		can be null	
is_payer_evaluated	是否已评价				
payer_evaluation	买方评价	VARCHAR		can be null	
is_seller_evaluated	是否已评价				
seller_evaluation	卖方评价	VARCHAR		can be null	
pay_id	交易码	VARCHAR			
 * @author yan
 *
 */
class Config_transaction_course
{
    const transaction_course = array(
        'id',
        'choosed_id',
        'state',
        'payer_id',
        'seller_id',
        'price',
        'date_choose',
        'date_pay',
        'payer_account_type',
        'payer_account',
        'seller_account_type',
        'payer_account',
        'is_payer_evaluated',
        'payer_evaluation',
        'is_seller_evaluated',
        'seller_evaluation',
        'pay_id',
    );
}

?>