<form action="/signin" method="post">
    <h2>Sign in</h2>
    <label for="email">Email:</label>
    <input style="<?=  isset($errors['email']) ? 'border: 2px solid red' : '' ?>" type="email" id="email"  value="<?= $values['email']  ?? '' ?>"  name="email" >

    <label for="password">Password</label>
    <input  style="<?=  isset($errors['password']) ? 'border: 2px solid red' : '' ?>"  type="password" id="password" name="password" >

    <button type="submit">Submit</button>
</form>

