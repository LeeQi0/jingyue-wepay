# jingyuetan 微信支付的代码。 

* 使用微信支付的sdk和开源thinkphp框架的结合。

* 以我来看，主要就是MVC。      
    *  M是写入的东西。
    *  c是写入的条件，和对V 与 M中间的一些小处理。
    *  v是获得数据。

###具体部署

将微信支付的SDK放到thinkphp的入口文件下。当需要调用时直接require。


###目录结构（逻辑目录）


                      |--thinksun
                      |    |--font
                      |    |    |--show
                      |          --purchase
                                 --order
                      |    |--admin
                      |
                      |
                      |--wxapi
                          |--example
                              |--getopenid
                               --jsapi
                               --refund
                               --notiy
                          |--database
                              |--config
                               --getdata
                     |--ticketapi
                          |--example
                              |--sale
                               --refund
                               --query
                          |--lib
                              |--data
                               --api
                               --config
         


###后台逻辑

*    **(这里面默认是，退款与核销只能一次性不能多次性)**

*    **这里注意！！！！ 括号里面的是需要编写的模块！！！ 括号里面的是需要编写的模块。**

#####**三种东西的需要前端的参数**（请求1）（V）

1.  支付
 
     1.      （需要的参数）  金额（从道理上来说应该后台算），通过金额算票数，前端的票数是给用户看的。
2.  notify（内嵌查询）
    
    1.  （不要参数）
    
    2.  （数据库操作） 
                   
                  * 简单的写整个的表。
                   
                  *（需要一个过滤函数）过滤一遍然后再写一遍表。
    
                   
    3.  （准备另一个请求）
                  
                  *（过滤一遍）
3.  退款

     1.   （需要的参数）退款需要的是微信订单号（金额直接自己写）

#####**后来请求参数**（请求2）（V）

1.  登录
  
2.  查询票种
       
       1.获得json数据，并且对必要参数进行判断。
            
       2.传递json数据。
       
       3.获得返回信息。判断
      
      
3.  订票

4.  退款


#####数据库表的写入（M和C）

1.   JingyueWeChat（最重要最难写）
 
      1.  预定  只要TicketId,reservetion,wheretopay,wheretobuy
      
      2.  微信支付 需要TicketId,wheretopay,wheretobuy,transaction_id
      
      3.  请求票  修改 ifgetticket
      
      4.  退款  修改ifrefundmoney
      
      5.  退票  修改ifrefundticket


###前台和后台功能

####前台

###后台{核销(高级管理员)  异常处理（低级管理员）}

1.   核销的功能。
    
    1.  显示数据库里面的账单。
      
