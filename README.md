# jingyuetan 微信支付的代码。 

使用微信支付的sdk和开源thinkphp框架的结合。 

###具体部署

将微信支付的SDK放到thinkphp的入口文件下。当需要调用时直接require。

###后台逻辑

#####**三种东西的需要前端的参数**（请求1）
(这里面默认是，退款与核销只能一次性不能多次性)
这里就是的简单调用三个接口。.............................

*    **这里注意！！！！ 括号里面的是需要编写的模块！！！ 括号里面的是需要编写的模块。**

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

#####**后来请求参数**（请求2）

1.  登录

2.  查询票种

3.  订票

4.  退款

