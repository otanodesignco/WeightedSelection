<?php

// port from javascript version from http://codetheory.in
class WeightedRandomSelection
{
	const MIN = 0;
	private $weight_sum;
	private $total_weight;
	private $weights;
	private $weight;
	private $rgn;
	private $weight_count;
	
	public function __construct( $weights )
	{
		if( is_array( $weights ) )
		{
			$this->weights = $weights;
			$this->total_weight = array_sum( $this->weights );
			$this->rgn = $this->random( self::MIN, $this->total_weight );
			$this->weight_sum = 0;
			$this->weight_count = count( $this->weights );
		}
		else
		{
			throw new InvalidArgumentException( "Weight must be an array" );
		}
	}
	
	public function selectWeight()
	{
		for( $i = 0; $i < $this->weight_count; $i++ )
		{
			$this->weight_sum += $this->weights[ $i ];
			$this->weight_sum = number_format( $this->weight_sum, 2 );
			
			if( $this->rgn <= $this->weight_sum )
			{
				return $this->weights[ $i ];
			}
		}
	}
	
	private function random( $min, $max )
	{
		return rand() * ($max - $min) + $min;
	}
}
?>