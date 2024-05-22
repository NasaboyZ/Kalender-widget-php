<?php
class SixthExample {
    // Irgend eine Eigenschaft
    public $bestStr = "You are simply the best!";

    // Irgend eine Methode
    function saySomethingNice() {
        $str = "I am proud of you!<br>";
        // Lesen einer Eigenschaft (innerhalb des Bauchs vom Superhero)
        $str .= $this -> bestStr;
        // Aufrufen einer Methode (innerhalb des Bauchs vom Superhero)
        $str .= $this -> createEmojis();
        return $str;
    }

    function createEmojis() {
        $emojis = "<p style=\"font-size: 32px;\">";
        for ($i=0; $i<10; $i++) {
            $emojis .= "😍 ";
        }
        $emojis .= "</p>";
        return $emojis;
    }
}
?>