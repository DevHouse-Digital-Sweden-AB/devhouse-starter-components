{{-- 
    Component: Yoast breadcrumbs
    Requires: Tailwind CSS
--}}

{!! function_exists('yoast_breadcrumb') ? yoast_breadcrumb('<nav  class="dh-breadcrumbs" aria-label="breadcrumbs" id="breadcrumbs">', '</nav>') : '' !!}

{{--
    For accessible breadcrumbs:

    Functions:
    
    function filter_wpseo_breadcrumb_separator($this_options_breadcrumbs_sep)
    {
        return null;
    }
    add_filter('wpseo_breadcrumb_separator', 'filter_wpseo_breadcrumb_separator');
    
    // Convert the Yoast Breadcrumbs output wrapper into an ordered list.
    add_filter('wpseo_breadcrumb_output_wrapper', function () {
        return 'ol';
    });
    
    // Convert the Yoast Breadcrumbs single items into list items.
    add_filter('wpseo_breadcrumb_single_link_wrapper', function () {
        return 'li';
    });
    
    Css:
    
    #breadcrumbs {
        ol {
            @apply flex items-center;
            
            li {
                &:not(:last-child) {
                    &::after {
                        content: '/';
                        margin: 0 4px;
                    }
                }
            }
        }
        
        a:first-of-type {
            @apply underline;
        }
    }
--}}