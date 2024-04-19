<?php
session_start();
include_once 'config/conex.php';
if (isset($_SESSION['id_usuario']) || isset($_SESSION['id_empleado']) || isset($_SESSION['id_administrador'])) {
    if ($_SESSION['rol'] == 1) {
        header("Location:home_usuario.php");
    } elseif ($_SESSION['rol'] == 2) {
        header("Location:home_empleado.php");
    } elseif ($_SESSION['rol'] == 3) {
        header("Location:home_administrador.php");
    }
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $contra = $_POST['password'];
    if (empty($email) || empty($contra)) {
        echo "<script>alert('Debe ingresar el correo electrónico y la contraseña'); window.setTimeout(function(){ window.location.href = 'index.html'; }, 1000);</script>";
    } else {
        $sql = "SELECT * FROM `registro` WHERE email = :email AND contraseña = :contra ";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contra', $contra);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id_usuario'] = $user['id_usuario']; // Guarda el ID de usuario en la sesión
            $_SESSION['rol'] = $user['rol']; // Guarda el rol del usuario en la sesión
            if ($user['rol'] == 1) {
                header("Location:home_usuario.php");
            }
            exit;
        } else {
            $sql = "SELECT * FROM `empleados` WHERE email = :email AND contraseña = :contra ";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contra', $contra);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {
                $empleado_id = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id_empleado'] = $empleado_id['id_empleado']; // Guarda el ID de empleado en la sesión
                $_SESSION['rol'] = $empleado_id['rol']; // Guarda el rol del usuario en la sesión
                if ($empleado_id['rol'] == 2) {
                    header("Location:home_empleado.php");
                }
                exit;
            } else {
                $sql = "SELECT * FROM `administradores` WHERE email = :email AND contraseña = :contra ";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':contra', $contra);
                $stmt->execute();
                if ($stmt->rowCount() == 1) {
                    $admin_id = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id_administrador'] = $admin_id['id_administrador']; // Guarda el ID de administrador en la sesión
                    $_SESSION['rol'] = $admin_id['rol']; // Guarda el rol del usuario en la sesión
                    if ($admin_id['rol'] == 3) {
                        header("Location:home_administrador.php");
                    }
                    exit;
                } else {
                    echo "<script>alert('Usuario y/o contraseña incorrectos'); window.setTimeout(function(){ window.location.href = 'index.html'; }, 1000);</script>";
                }
            }
        }
    }
}
?>