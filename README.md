# Introducing Bluesky Checkpoints

Bluesky Checkpoints is a little project I started and have hosted on my domain so when people find my Bluesky account which is also my domain they can connect to more people!


# Setting up your own instance

Setting up your own instance is pretty easy! I will show a run down of how you can have it hosted via a VPS or hosting provider that supports PHP 8.x!.

So first things first is to go to a location on your computer in your terminal (for this I'm using command prompt on Windows but this process should be the exact same on both MacOS and Linux!)

```
cd C:\
mkdir BlueskyCheckpoint
cd BlueskyCheckpoint
```

Now we're going to install Git from their official website find it here: https://git-scm.com/downloads

After that run the following command in the Git Bash application while still in that directory we went to earlier so we can pull down the Bluesky Checkpoint repository onto your computer!

```bash
git clone https://github.com/Sinkcat113/Bluesky-Checkpoint.git .
```
(Alternatively you can just download it as a zip if the command line is not something you're comfortable with.)

Okay after that let's open that folder in your text editor of choice! 

Now let's navigate to index.php. Inside of index.php is where basically 99% of the program functions! There should be ```echo``` syntax inside index.php. This is where our main focus will be. Inside the ```div``` with the ```class=view```. The first ```echo``` there should be a collection of tags that look like this below:
```html
<b><p>Checkpoint started by <a target=_blank href=https://bsky.app/profile/sink.cat>@sink.cat</a></p></b>
```

Between this anchor <a href></a> tag
```html
<a target=_blank href=https://bsky.app/profile/sink.cat>@sink.cat</a>
```

Where it says @sink.cat. Replace that with your own handle on bluesky! where it says href= paste the link to your Bluesky profile so when people click it it takes them to your profile!

And that's it for index.php! If your familiar with HTML and CSS Change anything else you'd like change the visual style, change the font, the colors, make it yours! 

Now let's get it hosted! (We will come back to connection.php once we have this project hosted on your VPS of choice!)

Now let's choose a VPS (Virtual Private Server) or hosting provider that supports PHP I will list some here that you can use!

* https://www.hostinger.com/
* https://www.bluehost.com/
* https://www.greengeeks.com/

These hosts should give you some sort of admin panel that you can access and from there can access the file system of your server! Once locating that drag and drop or upload the BlueskyCheckpoint folder into the public folder but make sure you just upload the files not the folder itself! So for example when you click into the public folder you should see all the files for Bluesky Checkpoint icluding the index.php file. 
**NOTE**: Git may have created another folder inside the folder you created. Upload the files within folder that Git created. 

### connection.php and getting a MySQL Database set up.

These hosts should offer you the ability to create and manage your own MySQL Database. There should be a Database section in your admin panel that allows you to manage and create new databases. **Remember**: make a strong 20 character or more password for your database!

Once you've got a MySQL instance setup, launch PHPMyAdmin from your MySQL dashboard. Then, when your inside PHPMyAdmin, locate the __new__ link at the top of the left pane of the PHPMyAdmin dashboard and give the database a name and create it. Then locate the import tab at the top! Once there, you should find a browse files button. Click that and locate the bsky_share.sql file inside your BlueskyCheckpoint directory where we originally pulled down the Bluesky Checkpoint project. 

Now let's go to connection.php (these hosts should offer you the ability to edit your files right there within the panel. if not edit connection.php on your computer and then reupload and replace it in the panel).

Inside connection.php you will see 4 key-values. One for host, one for user, password and the database itself. these correspond with how you setup your MySQL database. Your hosting provider should give you a URL at which your MySQL database is being hosted on enter that into the ```$host``` variable between the "" marks. The user will be the username you've set for either your hosting provider as a whole, or the MySQL instance itself. put your username in the ```$user``` string. and for password put that as whatever you set your MySQL password to be and now for ```$db```, remember that database you created and the SQL file we imported to PHPMyAdmin? Set the ```$db``` variable to the name of that database.

This should pretty much wrap things up! If you have any issues make a github issue and I'll take a look. Things may varry between hosting providers so if something i said here doesn't add up to your hosting provider, Google it! Or of course make an issue and I or whoever will help you out!


# Self Hosting (Advanced Sort Of)

You can of course also self host this on your own machine with an Apache web server and MySQL database which is how I'm hosting mine!


## Enjoy!
This project is in no way associated with Bluesky itself!
