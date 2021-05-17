<!DOCTYPE html>

<html>

    <title>Api Prototype</title>
   
    <body>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">                    <!--User inputs password into the form-->
        Input Password: <input type="text" name ="testPassword">
        <input type="submit">
        </form>

        <?php
                $userPassword = $_POST['testPassword'];                                    

                $lengthScore = 0;
                $numericScore = 0;
                $complexScore = 0;
                $capitalScore = 0;
                                        
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                    
                function length($userPassword, $lengthScore) { 
                    if (strlen($userPassword)) {
                        if (strlen($userPassword) <= 8) {

                            $lengthScore += 1;  
                        }  
                        else if (strlen($userPassword) >= 9 && strlen($userPassword) <=16) {

                            $lengthScore += 2;    
                        }
                        else if (strlen($userPassword) >= 17)  {
                        
                            $lengthScore += 3;
                        }                           
                     }   
                    echo "Length Score: $lengthScore,\r\n ";
                };

                function capitals($userPassword, $capitalScore) {
                    if (preg_match('/[A-Z]/', $userPassword)) {
                        if (!preg_match_all('/[A-Z]/', $userPassword)) {

                            $capitalScore = 0;                            
                        }  
                        else if (preg_match_all('/[A-Z]/', $userPassword) == 1) {

                            $capitalScore += 1;
                        }  
                        else if (preg_match_all('/[A-Z]/', $userPassword) == 2) {

                            $capitalScore += 2;
                        }    
                        else if (preg_match_all('/[A-Z]/', $userPassword) >= 3) {

                            $capitalScore += 3;

                        }   
                    }  
                    echo "Capital Score: $capitalScore, ";
                };
                
                function numbers($userPassword, $numericScore) {
                    if (preg_match('/[0-9]/', $userPassword)) {
                        if (!preg_match_all('/[0-9]/', $userPassword)) {

                            $numericScore = 0;
                        } 
                        else if (preg_match_all('/[0-9]/', $userPassword) == 1) {

                            $numericScore += 1;
                        } 
                        else if (preg_match_all('/[0-9]/', $userPassword) == 2) {

                            $numericScore += 2;
                        } 
                        else if (preg_match_all('/[0-9]/', $userPassword) >= 3) {

                            $numericScore += 3;
                        }                             
                    }  
                    echo "Numeric Score: $numericScore, ";
                };

                function complexity($userPassword, $complexScore) {
                    if (preg_match_all('/[\'()^&$%£*!}{#@~?><>,|=_+¬-]/', $userPassword)) {   

                        if (!preg_match_all('/[\'()^&$%£*!}{#@~?><>,|=_+¬-]/', $userPassword)) {    
                            
                            $complexScore = 0;
                        }
                        else if (preg_match_all('/[\'()^&$%£*!}{#@~?><>,|=_+¬-]/', $userPassword) == 1) {    
                            
                            $complexScore += 1;
                        }
                        else if (preg_match_all('/[\'()^&$%£*!}{#@~?><>,|=_+¬-]/', $userPassword) == 2) {    
                            
                            $complexScore += 2;
                        }
                        else if (preg_match_all('/[\'()^&$%£*!}{#@~?><>,|=_+¬-]/', $userPassword) >= 3) {    
                            
                            $complexScore += 3;
                        }   
                    } 
                    echo "Complex Score: $complexScore, ";
                };
                
                length($userPassword, $lengthScore);
                capitals($userPassword, $capitalScore);
                numbers($userPassword, $numericScore);
                complexity($userPassword, $complexScore);     

            }       
        ?>

    </body>

</html>