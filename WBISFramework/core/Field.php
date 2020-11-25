<?php 

namespace app\core;

class Field

{
    public const drzave = [
        "Afghanistan", " Akrotiri", " Albania", " Algeria", " American Samoa", " Andorra", " Angola", " Anguilla", " Antarctica",
        " Antigua and Barbuda", " Argentina", " Armenia", " Aruba", " Ashmore and Cartier Islands", " Australia", " Austria", " Azerbaijan",
        " Bahamas, The", " Bahrain", " Bangladesh", " Barbados", " Bassas da India", " Belarus", " Belgium", " Belize", " Benin", " Bermuda",
        " Bhutan", " Bolivia", " Bosnia and Herzegovina", " Botswana", " Bouvet Island", " Brazil", " British Indian Ocean Territory",
        " British Virgin Islands", " Brunei", " Bulgaria", " Burkina Faso", " Burma", " Burundi", " Cambodia", " Cameroon", " Canada",
        " Cape Verde", " Cayman Islands", " Central African Republic", " Chad", " Chile", " China", " Christmas Island", " Clipperton Island",
        " Cocos (Keeling) Islands", " Colombia", " Comoros", " Congo, Democratic Republic of the", " Congo, Republic of the", " Cook Islands",
        " Coral Sea Islands", " Costa Rica", " Cote d'Ivoire", " Croatia", " Cuba", " Cyprus", " Czech Republic", " Denmark", " Dhekelia",
        " Djibouti", " Dominica", " Dominican Republic", " Ecuador", " Egypt", " El Salvador", " Equatorial Guinea", " Eritrea", " Estonia",
        " Ethiopia", " Europa Island", " Falkland Islands (Islas Malvinas)", " Faroe Islands", " Fiji", " Finland", " France",
        " French Guiana", " French Polynesia", " French Southern and Antarctic Lands", " Gabon", " Gambia, The", " Gaza Strip", " Georgia",
        " Germany", " Ghana", " Gibraltar", " Glorioso Islands", " Greece", " Greenland", " Grenada", " Guadeloupe", " Guam",
        " Guatemala", " Guernsey", " Guinea", " Guinea-Bissau", " Guyana", " Haiti", " Heard Island and McDonald Islands",
        " Holy See (Vatican City)", " Honduras", " Hong Kong", " Hungary", " Iceland", " India", " Indonesia", " Iran", " Iraq",
        " Ireland", " Isle of Man", " Israel", " Italy", " Jamaica", " Jan Mayen", " Japan", " Jersey", " Jordan",
        " Juan de Nova Island", " Kazakhstan", " Kenya", " Kiribati", " Korea, North", " Korea, South", " Kuwait", " Kyrgyzstan",
        " Laos", " Latvia", " Lebanon", " Lesotho", " Liberia", " Libya", " Liechtenstein", " Lithuania", " Luxembourg", " Macau",
        " Macedonia", " Madagascar", " Malawi", " Malaysia", " Maldives", " Mali", " Malta", " Marshall Islands", " Martinique",
        " Mauritania", " Mauritius", " Mayotte", " Mexico", " Micronesia, Federated States of", " Moldova", " Monaco", " Mongolia",
        " Montserrat", " Morocco", " Mozambique", " Namibia", " Nauru", " Navassa Island", " Nepal", " Netherlands",
        " Netherlands Antilles", " New Caledonia", " New Zealand", " Nicaragua", " Niger", " Nigeria", " Niue", " Norfolk Island",
        " Northern Mariana Islands", " Norway", " Oman", " Pakistan", " Palau", " Panama", " Papua New Guinea", " Paracel Islands",
        " Paraguay", " Peru", " Philippines", " Pitcairn Islands", " Poland", " Portugal", " Puerto Rico", " Qatar", " Reunion",
        " Romania", " Russia", " Rwanda", " Saint Helena", " Saint Kitts and Nevis", " Saint Lucia", " Saint Pierre and Miquelon",
        " Saint Vincent and the Grenadines", " Samoa", " San Marino", " Sao Tome and Principe", " Saudi Arabia", " Senegal", " Serbia",
        "Montenegro", " Seychelles", " Sierra Leone", " Singapore", " Slovakia", " Slovenia", " Solomon Islands", " Somalia",
        " South Africa", " South Georgia and the South Sandwich Islands", " Spain", " Spratly Islands", " Sri Lanka", " Sudan",
        " Suriname", " Svalbard", " Swaziland", " Sweden", " Switzerland", " Syria", " Taiwan", " Tajikistan", " Tanzania",
        " Thailand", " Timor-Leste", " Togo", " Tokelau", " Tonga", " Trinidad and Tobago", " Tromelin Island", " Tunisia",
        " Turkey", " Turkmenistan", " Turks and Caicos Islands", " Tuvalu", " Uganda", " Ukraine", " United Arab Emirates",
        " United Kingdom", " United States", " Uruguay", " Uzbekistan", " Vanuatu", " Venezuela", " Vietnam", " Virgin Islands",
        " Wake Island", " Wallis and Futuna", " West Bank", " Western Sahara", " Yemen", " Zambia", " Zimbabwe"
    ];

    public $model;
    public $attribute;
    public $type;
    public function __construct($model,$attribute,$type) {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = $type;
        
    }  

    public function __toString()
    {
       // var_dump($this->model);
        return sprintf("
        <label for='%s'>%s</label> <br>
         <input type='%s' name='%s' value='%s' class='%s %s' placeholder='%s' required> <br>
         <div class='invalid-feedback'>
         %s
         </div><br>
            "
         , $this->attribute
         , $this->model->labels()[$this->attribute]
         , $this->type
         , $this->attribute
         , $this->model->{$this->attribute}
         , $this->attribute
         , $this->model->existError($this->attribute) ? "is-invalid" : ''
         , $this->attribute
         , $this->model->firstError($this->attribute)
     );
    
    }
    public static function inputCountry($name,$class)
    {  
        $label= "<label for='$name' class='form-label'>Choose your country:</label><br>";
            $opening = "<select name='$name' class='$class'>";
            $closing = "</select>";
            $niz=[];
            foreach (self::drzave as $drzava) {
                    
                    array_push($niz,"<option value='$drzava'>$drzava</option>");
            }

            return $label . $opening . implode("<br>",$niz) . $closing;
    }

    public static function dateOfBirth()
    {
        $label = "<label for='datumRodjenja' class='form-label'>Choose your date of birth:</label><br>";
     
        $godina = strval(intval(date('Y')) - 18);
        $mesec = date('m');
        $dan = date('d');

        $birthday = $godina . "-" . $mesec . "-" . $dan;
        return $label ."<input required type=\"date\" name=\"datumRodjenja\" id=\"birthday\" maxlength=\"4\" class=\"date\" placeholder=\"Year...\" max=\"$birthday\">";
          
    }

    /*
    public static function inputGame($name,$class)
    {  
        $label= "<label for='$name' class='upload-label'>Choose the Game:</label><br>";
            $opening = "<select name='$name' class='$class'>";
            $closing = "</select>";
            $niz=[];
            foreach (self::games as $game) {
                    
                    array_push($niz,"<option value='$game'>$game</option>");
            }

            return $label . $opening . implode("<br>",$niz) . $closing;
    }

    Proveri i ovo, pretpostavljam da treba da se izmeni foreach jer treba da dohvatimo igrice iz baze

    */

}  

?>

