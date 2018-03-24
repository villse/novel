<?php
// 公共函数
    /**
     * 获取一个随机字符串 
     * @param $len 字符串长度
     * @return string 随机字符串
     */
    function getRandStr($len = 6){
        $letter = implode("",range("a","z")).implode("",range("A","Z"));
        $letlen = strlen($letter)-1;
        $res = "";
        for ($i=0; $i < $len; $i++) { 
            $res .= $letter{mt_rand("0",$letlen)};
        }
        return $res;
    }

    /**
     * 获取请求ip
     * @return ip地址
     */
    function ip() {
        if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
            $ip = getenv('REMOTE_ADDR');
        } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
    }

    /**
     * 防sql注入
     * @param $string
     * @return string
     */
    function injCheck($sql_str) {  
        $check = preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/', $sql_str);
        if ($check) { 
            echo '非法字符！！'; 
            exit; 
        } else { 
            return $sql_str; 
        } 
    }

    /**
     * xss过滤函数
     * @param $string
     * @return string
     */
    function remove_xss($string) { 
        $string = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S', '', $string);
        $parm1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
        $parm2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
        $parm = array_merge($parm1, $parm2); 
        for ($i = 0; $i < sizeof($parm); $i++) { 
            $pattern = '/'; 
            for ($j = 0; $j < strlen($parm[$i]); $j++) { 
                if ($j > 0) { 
                    $pattern .= '('; 
                    $pattern .= '(&#[x|X]0([9][a][b]);?)?'; 
                    $pattern .= '|(&#0([9][10][13]);?)?'; 
                    $pattern .= ')?'; 
                }
                $pattern .= $parm[$i][$j]; 
            }
            $pattern .= '/i';
            $string = preg_replace($pattern, ' ', $string); 
        }
        return $string;
    }
    /**
     * 安全过滤函数
     * @param $string
     * @return string
     */
    function safe_replace($string) {
        $string = str_replace('%20','',$string);
        $string = str_replace('%27','',$string);
        $string = str_replace('%2527','',$string);
        $string = str_replace('*','',$string);
        $string = str_replace('"','&quot;',$string);
        $string = str_replace("'",'',$string);
        $string = str_replace('"','',$string);
        $string = str_replace(';','',$string);
        $string = str_replace('<','&lt;',$string);
        $string = str_replace('>','&gt;',$string);
        $string = str_replace("{",'',$string);
        $string = str_replace('}','',$string);
        $string = str_replace('\\','',$string);
        return remove_xss($string);
    }

    /**
     * 取得文件扩展
     * @param $filename 文件名
     * @return 扩展名
     */
    function fileext($filename) {
        return strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
    }