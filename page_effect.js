
$(document).ready
(   function()
    {   $("input").focus
        (   function()
            {   $(this).css
                (   {"background-color":"#D0D0D0"}   );
            }
        );
        $("input").blur
        (   function()
            {   $(this).css
                (   {"background-color":"rgba(0,0,0,0)"}   );
            }
        );
        $("#leaderboard_button").click
        (   function()
            {   $("#answer_area").hide
                (      );
                $("#leaderboard_area").toggle
                (      );
            }
        );
        $("#answer_button").click
        (   function()
            {   $("#leaderboard_area").hide
                (      );
                $("#answer_area").toggle
                (      );
            }
        );
        $("input:not([readonly])").css
        (   {"color":"blue"}   );
    }
);
