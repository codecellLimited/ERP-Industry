<?php


/**
 * 
 *  ===============    App Settings    ===================
 * 
 */
function AppProperties()
{
    return \App\Models\AppSettings::first();
}


/**
 * 
 *  ===============    App Language    ===================
 * 
 */

function changeLang($langCode){
    
    \App::setLocale($langCode);
    session()->put("langCode",$langCode);
    return redirect()->back();
}



/**
 * 
 *  ===============    App Content    ===================
 * 
 */
function AppContent($section = null)
{
    if(is_null($section))
    {
        return "Pleasae provide one value to get content";
    }

    $row = \App\Models\AppContent::where('section', $section);

    if($row->exists())
    {
        if(session('langCode') == 'en')
        {
            return $row->first('data')->data;
        }
        else
        {
            return $row->first('data_in_bangla')->data_in_bangla;
        }
    }

    return 'Content Not Found';
}


/**
 * 
 *  ===============    App Content In Bangla   ===================
 * 
 */
function AppContentInBangla($section = null)
{
    if(is_null($section))
    {
        return "Pleasae provide one value to get content";
    }

    $row = \App\Models\AppContent::where('section', $section);

    if($row->exists())
    {
        return $row->first('data_in_bangla')->data_in_bangla;
    }

    return 'কন্টেন্ট পাওয়া যায় নি';
}



/**
 * 
 *  ===============    App Content in English  ===================
 * 
 */
function AppContentInEnglish($section = null)
{
    if(is_null($section))
    {
        return "Pleasae provide one value to get content";
    }

    $row = \App\Models\AppContent::where('section', $section);

    if($row->exists())
    {
        return $row->first('data')->data;
    }

    return 'Content Not Found';
}


/**
 * 
 * ===================       Ac Title       =====================
 * 
 */
function AcTitle($slug = null)
{
    if($slug == null)
    {
        return "Not found";
    }

    $row = \App\Models\AcTitle::where('slug', $slug);

    if($row->exists())
    {
        if (session('langCode') == 'en') 
        {
            return $row->first()->ac_title_in_english;
        } 
        else 
        {
            return $row->first()->ac_title_in_bangla;
        }
    }
    else
    {
        return $slug .' Not found';
    }    
    
}
// \App\Models\AcTitle::where('slug', $slug)->first()



function Translate($text)
{
    return $text;
    // return \GoogleTranslate::trans($text, app()->getLocale());
}


?>