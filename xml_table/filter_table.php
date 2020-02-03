
<?php

echo "<h2>Read the XML File</h2>";

?>

<?php
//Read the XML File = 1.countries_valid.xml
echo "<pre>";

$count=simplexml_load_file("countries_valid.xml");

print_r($count);

echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript"></script>
    <title>Read and Write Table</title>
</head>
<body>
    <h2>Read Table with Countries and arrange them with a filter by Default,Eastern,Western,Central</h2>
    <div class="table">
            <ul>
                <div class=countries>
                    <div class=selectmenu> 
                        <select id="selectarea" onchange="show()">
                                <option value="default">Default</option>
                                <option value="western">Western</option>
                                <option value="central">Central</option>
                                <option value="eastern">Eastern</option>
                        </select>
                                    <div class=xmltable>
                                                <div class=numbers>
                                                    <?php echo "<li>"."Numbers"."</li>"?>
                                                    <?php for($num=1;$num<9;$num++){
                                                        echo "<li>".$num."</li>";
                                                    } ?>
                                                </div>
                                                <div class=country>
                                                    <?php echo "<li>"."Country"."</li>"?>
                                                    <?php foreach ($count->country as $emp): ?>
                                                    <li><?php echo $emp->name."(".$emp->name['native'].")"?></li>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class=language>
                                                        <?php echo "<li>"."Language"."</li>"?>
                                                        <?php foreach ($count->country as $emp): ?>
                                                        <li><?php echo $emp->language."(".$emp->language['native'].")"?></li>
                                                        <?php endforeach; ?>
                                                </div>
                                                <div class=currency>
                                                        <?php echo "<li>"."Currency"."</li>"?>
                                                        <?php foreach ($count->country as $emp): ?>
                                                        <li><?php echo $emp->currency."(".$emp->currency['code'].")"?></li>
                                                        <?php endforeach; ?>
                                                </div>
                                                <div class=latitude>
                                                        <?php echo "<li>"."Latitude"."</li>"?>
                                                        <?php foreach ($count->country as $emp): ?>
                                                        <li><?php for($y=0;$y<8;$y++){
                                                            $coord= $emp->map_url[$y];
                                                            $latlong = preg_split('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $coord,null,PREG_SPLIT_DELIM_CAPTURE);
                                                            print_r($latlong[1]);
                                                            error_reporting(E_ALL ^ E_NOTICE);                           
                                                        }
                                                        ?></li>
                                                        <?php endforeach; ?>
                                                </div>
                                                <div class=longitude>
                                                        <?php echo "<li>"."Country"."</li>"?>
                                                        <?php foreach ($count->country as $emp): ?>
                                                        <li><?php
                                                        for($y=0;$y<8;$y++){
                                                        $coord= $emp->map_url[$y];
                                                        $latlong = preg_split('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $coord,null,PREG_SPLIT_DELIM_CAPTURE);
                                                        print_r($latlong[2]);                         
                                                            }
                                                        ?></li>
                                                        <?php endforeach; ?>
                                                </div>
                                                
                                    </div>
                

                </div>
                    <div class=euro>
                        
                                <div class=euronodes1>      
                                        <?php echo "<li>"."EURO:"."</li>"?>
                                        <?php
                                                $xml = simplexml_load_file('countries_valid.xml');
                                                $name = $xml->xpath("/countries/country/currency[@code='EUR']");
                                                foreach($name as $key=>$value){
                                                        echo "<li>".$value."</li>";
                                                    }
                                        ?>  
                                        
                                </div>
                                <div class=euronodes2>
                                            <?php echo "<li>"."Countries with EU:"."</li>"?>
                                            <?php
                                                $xml = simplexml_load_file('countries_valid.xml');
                                                $name = $xml->xpath("/countries/country/name[@native and ../currency[@code='EUR']]");
                                                foreach($name as $key=>$value){
                                                        echo "<li>".$value."</li>";
                                                    }
                                            ?>                                 
                                </div>                        
                    </div>        
                <div class=selmenu>
                    <div class=western value=western>
                                                
                                                <?php
                                                        $xml1 = simplexml_load_file('countries_valid.xml');
                                                        $namew1 = $xml1->xpath("//country[@zone='western']/name[@native]");
                                                ?>    
                                                <div class="numbers1">      
                                                        <?php echo "<li>"."Numbers"."</li>" ?>  
                                                        <?php for($numw1=1;$numw1<4;$numw1++){
                                                            echo "<li>".$numw1.".("."Western".")"."</li>";
                                                        } ?>
                                                </div>
                                            <div class=westernrow>
                                                <div class="country1">        
                                                        <?php echo "<li>"."Country"."</li>"?> 
                                                        <?php foreach($namew1 as $key=>$value){
                                                            echo "<li>".$value."</li>";
                                                        } ?>
                                                </div>   
                                                <div class="language1">         
                                                        <?php echo "<li>"."Language"."</li>";?>
                                                        <?php $namew2 = $xml1->xpath("//country[@zone='western']/language[@native]");     
                                                            foreach($namew2 as $key=>$value){
                                                                echo "<li>".$value."</li>";
                                                        } ?>
                                                </div>
                                                <div class="currency1">       
                                                        <?php echo "<li>"."Language"."</li>"?>
                                                        <?php $namew3 = $xml1->xpath("//country[@zone='western']/currency[@code]");     
                                                        foreach($namew3 as $key=>$value){
                                                            echo "<li>".$value."</li>";
                                                        } ?>
                                                </div> 
                                                <div class="latitude1">       
                                                        <?php echo "<li>"."Latitude"."</li>"?>
                                                        <?php 
                                                            $namew4 = $xml1->xpath("//country[@zone='western']/map_url"); 
                                                                    foreach($namew4 as $key=>$value){
                                                                        
                                                                        $latlong = preg_split('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $value,null,PREG_SPLIT_DELIM_CAPTURE);
                                                                        echo "<li>".$latlong[1]."</li>";
                                                                        error_reporting(E_ALL ^ E_NOTICE);  
                                                                    } 
                                                           ?>
                                                </div> 
                                                <div class="longitude1">       
                                                        <?php echo "<li>"."Longitude"."</li>"?>
                                                        <?php 
                                                            $namew5 = $xml1->xpath("//country[@zone='western']/map_url"); 
                                                            foreach($namew5 as $key=>$value){
                                
                                                                $latlong = preg_split('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $value,null,PREG_SPLIT_DELIM_CAPTURE);
                                                                echo "<li>".$latlong[2]."</li>";   
                                                            } 
                                               ?>
                                                </div>
                                            </div>
                                    </div>
                    <div class=central value=central>
                                                
                                                <?php
                                                        $xml2 = simplexml_load_file('countries_valid.xml');
                                                        $namec1 = $xml2->xpath("//country[@zone='central']/name[@native]");
                                                ?>    
                                                <div class="numbers2">      
                                                        <?php echo "<li>"."Numbers"."</li>" ?>  
                                                        <?php for($numc2=1;$numc2<3;$numc2++){
                                                            echo "<li>".$numc2.".("."Central".")"."</li>";
                                                        } ?>
                                                </div>
                                        <div class="centralrow">
                                                <div class="country2">        
                                                        <?php echo "<li>"."Country"."</li>"?> 
                                                        <?php foreach($namec1 as $key=>$value){
                                                            echo "<li>".$value."</li>";
                                                        } ?>
                                                </div>   
                                                <div class="language2">         
                                                        <?php echo "<li>"."Language"."</li>";?>
                                                        <?php $namec2 = $xml2->xpath("//country[@zone='central']/language[@native]");     
                                                            foreach($namec2 as $key=>$value){
                                                                echo "<li>".$value."</li>";
                                                        } ?>
                                                </div>
                                                <div class="currency2">       
                                                        <?php echo "<li>"."Language"."</li>"?>
                                                        <?php $namec3 = $xml2->xpath("//country[@zone='central']/currency[@code]");     
                                                        foreach($namec3 as $key=>$value){
                                                            echo "<li>".$value."</li>";
                                                        } ?>
                                                </div> 
                                                <div class="latitude2">       
                                                        <?php echo "<li>"."Latitude"."</li>"?>
                                                        <?php 
                                                            $namec4 = $xml2->xpath("//country[@zone='central']/map_url"); 
                                                                    foreach($namec4 as $key=>$value){
                                                                        $latlong = preg_split('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $value,null,PREG_SPLIT_DELIM_CAPTURE);
                                                                            echo "<li>".$latlong[1]."</li>"; 
                                                                    } 
                                                        
                                                         ?>
                                                </div> 
                                                <div class="longitude2">       
                                                        <?php echo "<li>"."Longitude"."</li>"?>
                                                        <?php 
                                                            $namec5 = $xml2->xpath("//country[@zone='central']/map_url"); 
                                                            foreach($namec5 as $key=>$value){
                                                                $latlong = preg_split('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $value,null,PREG_SPLIT_DELIM_CAPTURE);
                                                                echo "<li>".$latlong[2]."</li>"; 
                                                            } 
                                                            ?>
                                                </div>
                                             </div>          
                            </div>  
                                                                
                    <div class=eastern value=eastern> 
                                                
                                                <?php
                                                        $xml3 = simplexml_load_file('countries_valid.xml');
                                                        $namee1 = $xml3->xpath("//country[@zone='eastern']/name[@native]");
                                                ?>    
                                                <div class="numbers3">      
                                                        <?php echo "<li>"."Numbers"."</li>" ?>  
                                                        <?php for($nume3=1;$nume3<4;$nume3++){
                                                            echo "<li>".$nume3.".("."Eastern".")"."</li>";
                                                        } ?>
                                                </div>
                                        <div class="easternrow">
                                                <div class="country3">        
                                                        <?php echo "<li>"."Country"."</li>"?> 
                                                        <?php foreach($namee1 as $key=>$value){
                                                            echo "<li>".$value."</li>";
                                                        } ?>
                                                </div>   
                                                <div class="language3">         
                                                        <?php echo "<li>"."Language"."</li>";?>
                                                        <?php $namee2 = $xml3->xpath("//country[@zone='eastern']/language[@native]");     
                                                            foreach($namee2 as $key=>$value){
                                                                echo "<li>".$value."</li>";
                                                        } ?>
                                                </div>
                                                <div class="currency3">       
                                                        <?php echo "<li>"."Language"."</li>"?>
                                                        <?php $namee3 = $xml3->xpath("//country[@zone='eastern']/currency[@code]");     
                                                        foreach($namee3 as $key=>$value){
                                                            echo "<li>".$value."</li>";
                                                        } ?>
                                                </div> 
                                                <div class="latitude3">       
                                                        <?php echo "<li>"."Latitude"."</li>"?>
                                                        <?php 
                                                            $namee4 = $xml3->xpath("//country[@zone='eastern']/map_url"); 
                                                                    foreach($namee4 as $key=>$value){
                                                                        $latlong = preg_split('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $value,null,PREG_SPLIT_DELIM_CAPTURE);
                                                                            echo "<li>".$latlong[1]."</li>"; 
                                                                            error_reporting(E_ALL ^ E_NOTICE); 
                                                                    } 
                                                          ?>
                                                </div> 
                                                <div class="longitude3">       
                                                        <?php echo "<li>"."Longitude"."</li>"?>
                                                        <?php 
                                                            $namee5 = $xml->xpath("//country[@zone='eastern']/map_url"); 
                                                            foreach($namee5 as $key=>$value){
                                                                $latlong = preg_split('/@(\-?[0-9]+\.[0-9]+),(\-?[0-9]+\.[0-9]+)/', $value,null,PREG_SPLIT_DELIM_CAPTURE);
                                                                echo "<li>".$latlong[2]."</li>";
                                                            } 
                                                          
                                                        ?>
                                                </div>                                                                      
                                    </div>                         
                    </div> 
            </ul>                                   
    </div>                                                                
        
        
   
    <script>
        function show(){
            var areaSelect = document.getElementById("selectarea").value;
            if(areaSelect == "default")
                  {
                    document.getElementsByClassName("western")[0].style.display = 'none';
                    document.getElementsByClassName("central")[0].style.display = 'none';       
                    document.getElementsByClassName("eastern")[0].style.display = 'none'; 
                  }
            if(areaSelect == "western")
                  {
                    document.getElementsByClassName("western")[0].style.display = 'flex';
                    document.getElementsByClassName("central")[0].style.display = 'none';       
                    document.getElementsByClassName("eastern")[0].style.display = 'none';   
                  }
            if(areaSelect == "central")
                  {
                    document.getElementsByClassName("western")[0].style.display = 'none';
                    document.getElementsByClassName("central")[0].style.display = 'flex';       
                    document.getElementsByClassName("eastern")[0].style.display = 'none';  
                  }
            if(areaSelect == "eastern")
                  {
                    document.getElementsByClassName("western")[0].style.display = 'none';
                    document.getElementsByClassName("central")[0].style.display = 'none';       
                    document.getElementsByClassName("eastern")[0].style.display = 'flex';  
                  }
        }
                                                                        
    </script>                                          
    <style>
        .table {
        width: 100%;       
    }
    
    .table ul {
        justify-content: space-between;
        border: 5px solid #3d7f0b;
        background-color: #4CAF50;
        padding-left:0;
        list-style:none;

        
    }
   
    ul li {
        text-align: center;
        color: white;
        border: 1px solid #3d7f0b;
        background-color: #4CAF50;
        font-size: 18px;
        width:170px;
        padding:5px;
        
    }
    select{
        text-align: center;
        font-size: 18px;
        background-color: #4CAF50;
        text-align: center;
        color: white;
    }
 
    .xmltable{
        display:flex;
        flex-direction:row;
        
    }
    .selectmenu{
        display:flex;
        flex-direction:row;
        
    }
    .euro{
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        
    }
    .euro li{
        padding:5px;
    }
    .euronodes1 {
        display:flex;
       
    }
    .euronodes2 {
        display:flex;
        
    }
    .numbers{
        font-size: 18px;
    }
    .numbers li{
        font-size: 18px;
        padding:5px;
    }
    .numbers1,.numbers2,numbers3{
        font-size: 18px;
    }
   
    .numbers1 li,.numbers2 li,.numbers3 li{
        font-size: 18px;
        padding:5px;

    }
  
    .country1,.language1,.currency1,.latitude1,.longitude1{
        text-align: center;
        font-size: 18px; 
        display: flex;
        flex-direction:row;
        
      
    }
    .country1 li,.language1 li,.currency1 li,.latitude1 li,.longitude1 li{
        padding:5px;

    }
    .country2,.language2,.currency2,.latitude2,.longitude2{
        text-align: center;
        font-size: 18px; 
        display: flex;
        flex-direction:row;
    }
    .country2 li,.language2 li,.currency2 li,.latitude2 li,.longitude2 li{
        padding:5px;
    }
    .country3,.language3,.currency3,.latitude3,.longitude3{
        text-align: center;
        font-size: 18px;
        display: flex;
        flex-direction:row;
    }
    .country3 li,.language3 li,.currency3 li,.latitude3 li,.longitude3 li{
        padding:5px;
    }
    .selmenu {
        display:flex; */
        flex-direction:column;
    }
    .western {
        display: flex;
        flex-direction:row;
    }
    .numbers1{
      flex:1;
      flex-direction:column; 
    }
    .westernrow {
        flex:2;
 
    }
   
    .central{
        display:flex; 
    }
    .numbers2{
        flex:1;
    }
    .centralrow{
        flex:2;
    }  
    .eastern{
        display:flex; 
  
    }
    .numbers3{
        flex:1;
    }
    .easternrow{
        flex:2;
    }
    
    </style>
</body>
</html>
