<?php

class domains
{
	public static $select_domains = array(
		"building" => array(
			"brownstone" => "Brownstone",
			"high_rise" => "High Rise",
			"loft" => "Loft",
			"low_rise" => "Low Rise",
			"mid_rise" => "Mid Rise",
			"post_war" => "Post War",
			"pre_war" => "Pre War",
			"townhouse" => "Town House",
			"wallup" => "Wall Up"
		),
		"bedroom" => array(
			"default" => "None",
			"1" => "1 Bedroom",
			"2" => "2 Bedrooms",
			"3" => "3 Bedrooms",
			"4" => "4 Bedrooms"
		),
		"partbath" => array(
			"default" => "None",
			"1" => "1 Partbath",
			"2" => "2 Partbath",
			"3" => "3 Partbath",
			"4" => "4 Partbath"
		),
		"fullbath" => array(
			"default" => "None",
			"1" => "1 Fullbath",
			"2" => "2 Fullbath",
			"3" => "3 Fullbath",
			"4" => "4 Fullbath"
		),
		"service_level" => array(
			"default" => "None",
			"1" => "Level 1",
			"2" => "Level 2",
			"3" => "Level 3",
			"4" => "Level 4"
		),
		"access" => array(
			"default" => "None",
			"1" => "Level 1",
			"2" => "Level 2",
			"3" => "Level 3",
			"4" => "Level 4"
		),
		"walls_allowed" => array(
			"default" => "None",
			"1" => "Level 1",
			"2" => "Level 2",
			"3" => "Level 3",
			"4" => "Level 4"
		),
		"pet_policy" => array(
			"default" => "None",
			"no" => "Not Allowed",
			"yes" => "Allowed"
		),
		"walls_allowed" => array(
			"default" => "None",
			"no" => "Not Allowed",
			"yes" => "Allowed"
		),
		"building_age" => array(
			"default" => "None",
			"1" => "1",
			"2" => "2",
			"3" => "3",
			"4" => "4"
		),
		"diplomats" => array(
			"default" => "None",
			"accepted" => "Accepted",
			"accepted_waiver" => "Accepted with waiver",
			"accepted_case" => "Accepted on a case by case basis"
		),
	);
	
	public static $checkboxes = array(
		"apartment_features" => array(
			"outdoor_spaces" => "Outdoor Spaces",
			"fitness_pool" => "Fitness Pool",
			"doorman" => "Doorman",
			"parking_garage"=> "Parking Garage",
			"laundry" => "Laundry",
			"central_air" => "Central Air"
		),
		"for_" => array(
			"for_rent"=> "For Rent",
			"for_sale"=> "For Sale",
			"for_sublet" => "For Sublet",
			"for_sterm" => "For Short term"
		),
		"building_features" => array(
			"fireplace" => "Fireplace",
			"hardwood_floors" => "Hardwood Floors",
			"multilevel" => "Multilevel",
			"laundry_in_unit" => "Laundry In Unit",
			"high_ceilings" => "High Ceilings",
			"walk_in_closet"=> "Walk In Closet"
		)
	);
}