#日志

##2016.11.25
支付我觉得用跳转做比较好。测试了一波，用不跳转的情况，结果出现了很多问题，我解决起来很是麻烦。

上面这句话上面意思呢？
首先 支付分为三步 

1.    下单，这里需要从微信提供的官网获得信息。 需要要跳转页面，也就是说，从授权页面跳转过来。

2.    获得下单


##2016.11.28
现在的支付流程中的页面有3个（不包括成功页面）

1.    show，展示页面，基本信息，与后台的联系不大。

2.    填单页面，这里提供给后台**1.付款金额. 2openid. **

3.    付款页面，进入这个页面直接就下单了。其他的简单。



