<?php

    namespace App\TwigCustom;

    use Soyer\View\Custom\UserCustomView;

    use App\TwigCustom\Example;

    use App\Http\Controllers\UserState;
    use App\Models\Account;
    use App\Models\MS;

    class TwigCustom {

        public static function init() {
            $acc = new Account();					
            $message = new MS();

            UserCustomView::defineGlobalVariable("isLoggin", UserState::isUserID());
            
            UserCustomView::defineGlobalVariable("test", $acc -> CustomStmt("SELECT t_email FROM tb_account") -> executeWith() -> findOne()["t_email"] ?? "0");

            UserCustomView::defineGlobalVariable("email", isset($_SESSION['session_name']) ? $_SESSION['session_name'] : "");

            UserCustomView::defineGlobalVariable("id", isset($_SESSION['session_id']) ? $_SESSION['session_id'] : "");

            UserCustomView::defineGlobalVariable("number", isset($_SESSION['session_id']) ? $message -> CustomStmt("SELECT COUNT(id) AS total FROM repair_requests") -> where('user_id = ?',[$_SESSION["session_id"]]) ->executeWith()-> findOne()["total"] : 0);

            // UserCustomView::defineGlobalVariable("abc", $acc -> CustomStmt("SELECT COUNT(*) AS allcars  FROM repair_requests") -> executeWith() -> findOne()["allcars"] ?? "0");

            UserCustomView::defineGlobalVariable("username", UserState::getUserName());
            // HTML: {{ you_key }}

            UserCustomView::defineFunction("you_function_name", [Example::class, "plusInt"]);
            // HTML: {{ you_function_name(100) }}

        }

    }