<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nacionality = $_POST['nacionality'];
    $bdate = $_POST['bdate'];

    if (isset($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tempimage = $_FILES['image']['tmp_name'];
    } else {
        $image = '';
        $tempimage = '';
    }

    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $nacionality = mysqli_real_escape_string($conn, $nacionality);
    $bdate = mysqli_real_escape_string($conn, $bdate);
    $image = mysqli_real_escape_string($conn, $image);
    $tempimage = mysqli_real_escape_string($conn, $tempimage);
    $role = mysqli_real_escape_string($conn, $role);
    $password = mysqli_real_escape_string($conn, $password);
    $verified = 1;

    $folder = "../resources/_images/users/";

    $password = sha1($password);

    $checkemail = "SELECT * FROM user WHERE email ='$email'";
    $checkphone = "SELECT * FROM user WHERE phone_number ='$phone'";
    $resultemail = mysqli_query($conn, $checkemail);
    $resultphone = mysqli_query($conn, $checkphone);
    if ($resultemail && mysqli_num_rows($resultemail) == 0) {
        if ($resultphone && mysqli_num_rows($resultphone) == 0) {
            if ($image !== '') {
                $sql = "INSERT INTO user(name, email, phone_number, nacionality, birthdate, profile_image, verified, gender, role, password) 
                VALUES('$name', '$email', '$phone', '$nacionality', '$bdate', '$image', '$verified', '$gender', '$role', '$password')";

                move_uploaded_file($tempimage, $folder);
            } else {
                $sql = "INSERT INTO user(name, email, phone_number, nacionality, birthdate, verified, gender, role, password) 
                VALUES('$name', '$email', '$phone', '$nacionality', '$bdate', '$verified', '$gender', '$role', '$password')";
            }

            $regist = mysqli_query($conn, $sql);
            if (!$regist) {
                echo "<p> Erro ao inserir registo. <br>" . mysqli_error($conn);
            } else {

                echo "<p style='color:#40bf64;'> Registo inserido com sucesso. </p>";
                echo "<script>setTimeout(function() { window.location.href = './?p=2'; }, 1000);</script>";
                exit();
            }
        } else {
            echo "<p> Esse nº de telemóvel já está registado. </p>";
        }
    } else
        echo "<p> Esse email já está registado. </p>";
}
?>
<style>
    p {
        display: inline-block;
        font-size: 20px;
    }

    input {
        margin-left: 1rem;
    }
</style>
<div>
    <h3 style="text-align:left;">Inserir utilizador</h3>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div style="margin-top: 0.5rem; line-height: 2;">
            <div>
                <p>Nome</p>
                <input class="input-long-text" type="text" placeholder="Enter Name.." name="name" required>
            </div>
            <div>
                <p>Email</p>
                <input class="input-long-text" id="email" type="email" placeholder="Enter Email.." name="email" required>
            </div>
            <div>
                <p>Nº Telemóvel</p>
                <input type="tel" placeholder="Enter Phone Number.." name="phone" required>
            </div>
            <div>
                <p>Nacionalidade</p>
                <input type="text" placeholder="Enter Nacionality.." name="nacionality" required>
            </div>
            <div>
                <p>Data de nascimento</p>
                <input type="date" placeholder="Enter Birthdate.." name="bdate" required>
            </div>
            <!--<div>
                <p>Imagem de perfil</p>
                <input type="file" placeholder="Insert Image.." name="image" value="">
            </div>-->
            <div>
                <p>Género</p>
                <select name="gender" required>
                    <?php
                    $showdesc = "SELECT * FROM gender order by id;";
                    if ($show = mysqli_query($conn, $showdesc))
                        while ($row = mysqli_fetch_assoc($show))
                            echo "<option value='" . $row['id'] . "'>" . $row['description'] . "</option>";
                    ?>
                </select>
            </div>
            <div>
                <p>Role</p>
                <select name="role" required>

                    <?php
                    $showrole = "SELECT * FROM role order by id;";
                    if ($show = mysqli_query($conn, $showrole))
                        while ($row = mysqli_fetch_assoc($show))
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    ?>
                </select>
            </div>
            <div>
                <p>Password</p>
                <input class="input-long-text" type="password" placeholder="Enter Password.." name="password" required>
            </div>
        </div>
        <div style="margin-top: 0.5rem;">
            <input id="submit-button" class="insert-button" style="padding: 0.5rem; width:15%!important;" type="submit" value="Inserir">
            <a href="?p=2"><input class="return-button" style="width:15%!important; padding: 0.5rem;" type="button" value="Voltar"></a>
        </div>
    </form>
</div>