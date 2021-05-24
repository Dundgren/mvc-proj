# Pseudocode for "getHistogram()" found in GamesPlayedController.php

Prepare histogram as empty array.

FOR i = 0 to 21 incrementing by one
    Use i as key for histogram-array and 0 as value
ENDFOR

FOR rows IN GamesPlayed-table
    IF the rows winner is player
        Use player-score
    ELSEIF the rows winner is house
        Use house-score
    ENDIF

    Use chosen score as key for histogram array and increment the value
ENDFOR

Return the histogram
