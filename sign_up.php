        <form action="upload.php" method="post" enctype="multipart/form-data">
            <center>
                <fieldset style="width: 25%;">
                    <legend style="text-align: center;">STUDENT FORM</legend>
                    First Name: <input type="text" name="name" /> <br /> <br>
                    Father Name: <input type="text" name="fathername" /> <br /> <br>
                    <label for="email">Email Add:</label>
                    <input type="email" id="email" name="email" /> <br />
                    <label for="gender">Gender: </label>
                    <input type="radio" id="gender" name="gender" value="male" />Male
                    <input type="radio" id="gender" name="gender" value="female" />Female <br />
                    <br><br>
                    
                    Hobby:<br>
                    <input type="checkbox" id="cricket" name="hobby[]" value="cricket">
                    <label for="cricket">cricket</label> <br>

                    <input type="checkbox" id="football" name="hobby[]" value="football" />
                    <label for="football">Football</label> <br>

                    <input type="checkbox" id="hockey" name="hobby[]" value="hockey" />
                    <label for="hockey">Hockey</label><br />

                    Password : <input type="password" name="password" /> <br /> <br>
                    <br /><br />
                    <input type="submit" name="submit" value="submit">
                </fieldset>
            </center>
        </form>
        </body>
        </html>