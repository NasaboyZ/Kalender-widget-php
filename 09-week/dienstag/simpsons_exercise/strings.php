<?php
/* String-Operator */
// Der String-Operator in PHP ist der Punkt.
// 8ung: In JavaScript ist es das Plus-Zeichen!
echo "<h2>Block 1</h2>";
echo "Hallo"." "."Welt";
echo "<br>";
echo 'Hallo'.' '.'Welt';
echo "<br> ------------------------------------- <br>";


/* --- Variable mit String --- */
$var = " meine ";
echo "<h2>Block 2</h2>";
// So geht's immer, bedeutet aber viel Schreibarbeit...
echo "Hallo".$var."Welt";
echo "<br>";
echo 'Hallo'.$var.'Welt';
echo "<br> ------------------------------------- <br>";

// Mit den "intelligenten" Anführungszeichen
echo "<h2>Block 3</h2>";
echo "Hallo $var Welt";
echo "<br>";

// Mit den "dummen" Anführungszeichen
echo "<h2>Block 4</h2>";
echo 'Hallo $var Welt';
echo "<br> ------------------------------------- <br>";


/* Ausgabe von HTML */
// Vorbereitung: Was kommt hier heraus?
echo "<h2>Block 5</h2>";
echo "\"";
echo "<br>";
echo '"';
echo "<br> ------------------------------------- <br>";
echo "<h2>Block 6</h2>";
// Solange es keine Attribute hat, spielt es keine Rolle
echo '<p>Hallo Paragraf</p>';
echo "<p>Hallo Paragraf</p>";
echo "<br> ------------------------------------- <br>";
// Attribute: Die brauchen von sich aus auch Anführungszeichen
echo "<h2>Block 7</h2>";
echo "\n\n\n";

echo '<a href="http://www.google.ch">Zu Google</a>';
echo "<br>";
echo "<a href=\"http://www.google.ch\">Zu Google</a>\n";
echo "<br>"; // x
echo "<br> ------------------------------------- <br>";
echo "<h2>Block 8</h2>";
// Innerhalb den "dummen" Anführungszeichen kann man nicht "escapen"
echo "<p>Hallo Abschnitt</p>\n";
// vs
echo '<p>Hallo Abschnitt</p>\n';
echo "<br> ------------------------------------- <br>";
echo "<h2>Block 9</h2>";
// Komplexe Blöcke kann man auch so zusammensetzen
// -> Bitte Quellcode anschauen
$code = "<ul>\n";
$code .= "<li>Hallo</li>\n";
$code .= "<li>meine¨¨¨</li>\n";
$code .= "<li>Welt</li>\n";
$code .= "</ul>\n";
echo $code;
?>
