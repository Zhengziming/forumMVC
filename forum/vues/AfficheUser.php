        <h1>Affichage d'un seul User</h1>

<form method='POST' action="index.php">
Username:<br>
<input type="text" name="username" value='<?= $data["user"]->username ?>' readonly>
<br>
Banni:<br>
<input type="text" name="banni" value='<?= $data["user"]->banni ?>'>
<br>
Admin:<br>
<input type="text" name="admin" value='<?= $data["user"]->admin ?>'>
<br><br>
<input type="hidden" name="action" value="ModifierUser">
<input type="submit" name='submit' value="Submit">
</form> 