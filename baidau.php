<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors = [];
    if(empty(trim($_POST['fullname']))){
        $errors['fullname']['required'] ='khong duowc de trong';
    }else{
        if(strlen(trim($_POST['fullname']))<5){
            $errors['fullname']['min'] = 'ho ten > 5 ki tua';
        }
    }
    if(empty(trim($_POST['email']))){
        $errors['email']['required'] =' email khong duowc de trong';
    }else{
        if(!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
            $errors['email']['invaild'] = 'email khoong hop lw';
        }
    }
    if(empty(trim($_POST['age']))){
        $errors['age']['required'] =' tuoi khong duowc de trong';
    }else{
        if(!filter_var(trim($_POST['age']), FILTER_VALIDATE_INT,['options' =>['min_range => 1']])){
            $errors['age']['invaild'] = 'tuo ko hp';
        }
    }
    if( empty($errors)){
        echo' Validate thnh cong';
    }else{
        echo' Validate ko tc';
    }

}
?>

<form method="post" >
<p>
    Họ và tên: <br />
    <input type="text" name = "fullname" placeholder="Họ và tên">
    <br>
    <?php
        echo (!empty($errors['fullname']['required']))?'
        <span style="color:red;">'.$errors['fullname']['required'].'</span>':false;
        echo(!empty($errors['fullname']['min']))?' <span style="color:red;">'.$errors['fullname']['min'].'</span>':false;
    ?>  
</p>

<p>
    EMail: <br />
    <input type="text" name = "email" placeholder="email">
    <br>
    <?php
        echo (!empty($errors['email']['required']))?'
        <span style="color:red;">'.$errors['email']['required'].'</span>':false;
        echo(!empty($errors['email']['invaild']))?' <span style="color:red;">'.$errors['email']['invaild'].'</span>':false;
    ?>  
    
</p>
<p>
    Tuổi: <br />
    <input type="text" name = "age" placeholder="tuổi">
    <br>
    <?php
        echo (!empty($errors['age']['required']))?'
        <span style="color:red;">'.$errors['age']['required'].'</span>':false;
        echo(!empty($errors['age']['invaild']))?' <span style="color:red;">'.$errors['age']['invaild'].'</span>':false;
    ?>  
</p>
<button type = "submit"> submit </button>
</form>