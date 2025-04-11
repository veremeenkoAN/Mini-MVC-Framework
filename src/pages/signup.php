<form action="/signup" method="post">
    <h2>Sign up</h2>

    <label for="name">First Name:</label>
    <input  style="<?=  isset($errors['name']) ? 'border: 2px solid red' : '' ?>" type="text" id="name"  value="<?= $values['name'] ?? '' ?>" name="name" >
    <?php
    if (isset($errors['name'])) {
        foreach ($errors['name'] as $value) {
            echo "<span style='color: red'>$value</span><br><br>";
        }
    }
    ?>

    <label for="lastname">Last Name:</label>
    <input  style="<?=  isset($errors['lastname']) ? 'border: 2px solid red' : '' ?>"  type="text" id="lastname"  value="<?= $values['lastname']  ?? '' ?>" name="lastname" >
    <?php
    if (isset($errors['lastname'])) {
        foreach ($errors['lastname'] as $value) {
            echo "<span style='color: red'>$value</span><br><br>";
        }
    }
    ?>

    <label for="email">Email:</label>
    <input   style="<?=  isset($errors['email']) ? 'border: 2px solid red' : '' ?>" type="email" id="email"  value="<?= $values['email']  ?? '' ?>"  name="email" >
    <?php
    if (isset($errors['email'])) {
        foreach ($errors['email'] as $value) {
            echo "<span style='color: red' >$value</span><br><br>";
        }
    }
    ?>

    <label for="password">Password</label>
    <input  style="<?=  isset($errors['password']) ? 'border: 2px solid red' : '' ?>"  type="password" id="password" name="password" >
    <?php
    if (isset($errors['password'])) {
        foreach ($errors['password'] as $value) {
            echo "<span style='color: red'>$value</span><br><br>";
        }
    }
    ?>

    <button type="submit">Submit</button>
</form>
