#!/bin/bash

counter=0 # Test case counter

cat input1 | ./$1 > useroutput # dollar1 will be the question_id

output=`cat output1 | tr -d " \t\n\r"`

useroutput=`cat useroutput | tr -d " \t\n\r"`

if [ "$output" == "$useroutput" ]
	then
	((counter++))
fi

cat input2 | ./$1 > useroutput

output=`cat output2 | tr -d " \t\n\r"`

useroutput=`cat useroutput | tr -d " \t\n\r"`

if [ "$output" == "$useroutput" ]
	then
	((counter++))
fi

rm $1

echo $counter #Prints how many test cases passes.