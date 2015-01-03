<?php

// port of the python subtraction method from http://eli.thegreenplace.net
class WeightedSelection
{
	protected $weights;
	protected $weightCount;
	
	public function __construct( $weights )
	{
		if( is_array( $weights ) )
		{
			$this->weights = $weights;
			$this->weightCount = count( $this->weights );
		}
		else
		{
			throw new InvalidArgumentException( "Weights must be an array" );
		}
	}
	
	public function selectWeight( $weights )
	{
		$rgn = mt_rand() * array_sum( $this->weights );
		$i = 0;
			
		for( $i = 0; $i < $this->weightCount; $i++ )
		{
			$rgn -= $this->weights[ $i ];
				
			if( $rgn < 0 )
			{
				return $this->weights[ $i ];
			}
		}
	}
}
?>