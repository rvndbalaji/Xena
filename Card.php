
<?php 
/*DOCUMENTATION
Personal Website Cards - Material Design
Created on 17th Sep 15, 2:20pm
(c)2015 Aravind Balaji

USAGE:
1. Create an Object of type CARD
2. Set Card css properties [eg. color,height,width etc]
3. Call 'create' function to apply properties and create Card

EXAMPLE:

$card = new Card(); ----------Creating object
$card->setTitleColor("Black");---------Setting Card properties
$card->setBodyColor("#424E42");------------"-----"-----------
$card->create("About","30%");----------Creating and applying Card

*/


class Card
{
	private $width = "30%";
	private $height = "";
	private $card_title_color = "";
	private $card_body_color = "";
	private $title_textcolor="";
	private $body_textcolor="";
	
	function create($title,$body,$width,$height='')
	{
		$this->width = $width;
		$this->height = $height;
		echo "
			<div id='card_box'>
				<div id='card_title'>
					<span>$title</span>
				</div>
				
				<div id='card_body'>
				$body				
				</div>
			</div>
		";
		$this->apply();
	}
	
		
	function TitleColor($card_title_color)
	{
		$this->card_title_color = $card_title_color;
		
	}
	function BodyColor($card_body_color)
	{
		$this->card_body_color = $card_body_color;		
	}
	function Body_TextColor($body_textcolor)
	{
		$this->body_textcolor = $body_textcolor;		
	}
	function Title_TextColor($title_textcolor)
	{
		$this->title_textcolor = $title_textcolor;		
	}
	

	
	
	function apply()
	{
			echo "<style>
				#card_box
				{
					margin-left: 0.5%;
					margin-top: -0.5%;
					
					box-shadow: 0px 0px 10px Gray;					
					height: $this->height;					
					width: $this->width;
				}
				#card_title
				{
					padding: 2%;
					background:$this->card_title_color;						
					color:$this->title_textcolor;
				}
				#card_body
				{	padding: 2%;
					background: $this->card_body_color;			
					color:$this->body_textcolor;
				}
				
			
		</style>";
	}

}//Class Ends
?>


