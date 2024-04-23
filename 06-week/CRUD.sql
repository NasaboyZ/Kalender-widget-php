// C einen blog Post erstellen
INSERT INTO 'post' ('title','shorttext', 'longtext')
VALUES ('Mein erster Blog-Post', 'Hier ist der Inhalt meines ersten Blog-Posts.', 'Max Mustermann', '2024-04-15');

//R diesen Blog post auslesen(ID zuerst heruasfinden)
SELECT * FROM `post` WHERE `ID`=1;

//U diesen blog post erstellen
UPDATE BlogPosts
SET Title = 'Neuer Titel'
WHERE 'post'.'ID' = 1;
// D - diesen blog post erstellen
DELETE FROM 'post'WHERE 'ID'=1;


