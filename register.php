<?php 
include('bootstrap.php');
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>

    <div class="container">
        <div class="card mt-lg-5">
            <div class="card-header">
                <h2>สมัครสมาชิก</h2>
            </div>
            <div class="card-body">
                <form action="regis.php" method="post">
                    <div class="mb-3">
                        <label for="fname">ชื่อ</label>
                        <div class="col-sm-10">
                            <input type="text" name="fname" id="fname" class="form-control">
                        </div>

                            <label for="lname">นามสกุล</label>
                            <input type="text" name="lname" id="lname"  class="form-control"></td>

                            <td>ที่อยู่</td>
                            <td><textarea name="address" id="textarea" cols="20" rows="5"  class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <td>e-mail</td>
                            <td><input type="text" name="email" id="textfield3"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>เบอร์โทรศัพท์</td>
                            <td><input type="text" name="tel" id="textfield4"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>ชื่อผู้ใช้</td>
                            <td><input type="text" name="username" id="textfield5"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>รหัสผ่าน</td>
                            <td><input type="text" name="password" id="textfield6"  class="form-control"></td>
                        </tr>
                        <tr>
                            <br>
                            <td><input type="submit" name="button" id="button" value="ส่งข้อมูล" class="btn btn-success">
                                <input type="reset" name="button2" id="button2" value="ล้างข้อมูล" class="btn btn-primary">
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>