<?php

class Test 
{
	//model
function get_all_published_blogs($limits)
	{
		$query = $this->db->query("SELECT * FROM blogs WHERE is_active = 1 AND published = 1 ORDER BY published_on DESC LIMIT " . $limits . ", 10");

		$result = $query->result();

		return $result;
	}

//controller functions
function blog_list($page = 1)
	{
		$blog_posts = '';
		$comments = 0;
		$limits = ($page - 1)*10;
		$blogs = $this->m_blog->get_all_published_blogs($limits);

		if ($blogs) {
			$counter = 0;
			foreach ($blogs as $key => $value) {
				$counter++;
				$comments = $this->comments->get_comment_count($value->blog_id)->verified;
					if($value->blog_cover != NULL)
					{
						
                    	$blog_posts .= '<div class="date-outer">
        

          <div class="date-posts">
        
<div class="post-outer">
<article class="post hentry">
<a content="#"></a>
<a href="'.base_url().'blog/read/'.$value->blog_id.'"><div class="img-thumbnail"><img width="260" height="170" src="'.$value->blog_cover.'" alt="'.$value->blog_name.'" title="'.$value->blog_name.'"></div>
</a>
<span class="label-p">
<a href="#" rel="tag">Article</a>
<a href="#" rel="tag">Blogger</a>
</span>
<h2 class="post-title entry-title" itemprop="name">
<a href="'.base_url().'blog/read/'.$value->blog_id.'" title="'.$value->blog_name.'">
'.$value->blog_name.'
</a>
</h2>
<div class="post-info">
<span class="author-info">
<i class="fa fa-user"></i>
<span class="vcard">
<span class="fn">
<a class="g-profile" href="#" rel="author" title="author profile" data-gapiscan="true" data-onload="true" data-gapiattached="true">
<span>Admin</span>
</a>
</span>
</span>
</span>
<span class="time-info">
<i class="fa fa-calendar"></i>
<a class="timestamp-link" href="#" rel="bookmark" title="permanent link"><abbr class="published updated timeago" title="06.41">'.date('M d, Y', strtotime($value->published_on)).'</abbr></a>
</span>
<span class="comment-info">
<i class="fa fa-comments"></i>
<a href="#" onclick="">
'.$comments.' Comments
</a>
</span>
</div>
<div class="post-header">
<div class="post-header-line-1"></div>
<span class="post-author vcard" itemscope="itemscope" itemtype="http://schema.org/Person">
<span class="fn author">
<a href="#" rel="author" title="author profile">
<span itemprop="name">Admin</span>
</a>
</span>
</span>
</div>
<div class="post-body entry-content" id="post-body-3914700255083592688">
<div>
   '.implode(' ', array_slice(explode(' ', strip_tags($value->blog_content)), 0, 10)).'...
</div>
<a class="read-more" href="'.base_url().'blog/read/'.$value->blog_id.'" title="'.$value->blog_name.'"> Read More </a>
<div style="clear:both"></div>
</div>
</article>
</div>

            </div></div>';
					}
					else
					{
						$blog_posts .= '<div class="date-outer">
        

          <div class="date-posts">
        
<div class="post-outer">
<article class="post hentry">
<a content="#"></a>
<a href="'.base_url().'blog/read/'.$value->blog_id.'"><div class="img-thumbnail"><img width="260" height="170" src="'.base_url().'assets/images/no-image-available.jpg" alt="'.$value->blog_name.'" title="'.$value->blog_name.'"></div>
</a>
<span class="label-p">
<a href="#" rel="tag">Article</a>
<a href="#" rel="tag">Blogger</a>
</span>
<h2 class="post-title entry-title" itemprop="name">
<a href="'.base_url().'blog/read/'.$value->blog_id.'" title="'.$value->blog_name.'">
'.$value->blog_name.'
</a>
</h2>
<div class="post-info">
<span class="author-info">
<i class="fa fa-user"></i>
<span class="vcard">
<span class="fn">
<a class="g-profile" href="#" rel="author" title="author profile" data-gapiscan="true" data-onload="true" data-gapiattached="true">
<span>Admin</span>
</a>
</span>
</span>
</span>
<span class="time-info">
<i class="fa fa-calendar"></i>
<a class="timestamp-link" href="#" rel="bookmark" title="permanent link"><abbr class="published updated timeago" title="06.41">'.date('M d, Y', strtotime($value->published_on)).'</abbr></a>
</span>
<span class="comment-info">
<i class="fa fa-comments"></i>
<a href="#" onclick="">
'.$comments.' Comments
</a>
</span>
</div>
<div class="post-header">
<div class="post-header-line-1"></div>
<span class="post-author vcard" itemscope="itemscope" itemtype="http://schema.org/Person">
<span class="fn author">
<a href="#" rel="author" title="author profile">
<span itemprop="name">Admin</span>
</a>
</span>
</span>
</div>
<div class="post-body entry-content" id="post-body-3914700255083592688">
<div>
   '.implode(' ', array_slice(explode(' ', $value->blog_content), 0, 10)).'...
</div>
<a class="read-more" href="'.base_url().'blog/read/'.$value->blog_id.'" title="'.$value->blog_name.'"> Read More </a>
<div style="clear:both"></div>
</div>
</article>
</div>

            </div></div>';
					}
			}
		}
		else
		{
			$blog_posts = '<center><h3>No blog posts yet</h3></center>';
		}

		return $blog_posts;
	}


function createpagination($page = 1)
	{
		$pagination = '';
		$limits = ($page - 1) * 10;
		$query = $this->db->query("SELECT * FROM blogs WHERE is_active = 1 AND published = 1 ORDER BY published_on DESC");
		$blog_data = $query->result_array();
		$noofblogs = count($blog_data);
		$x = ceil($noofblogs / 10);
		$pagination .= '<li class="disabled"><a href="#">«</a></li>';
		for ($i= 1; $i <= $x; $i++) {
			$disabled = $active = ''; 
			if($page == $i)
			{
				$active = 'active';
			}

			$pagination .= '<li class = "'.$active.'"><a href = "'.base_url().'blog/page/'.$i.'">'.$i.'</a></li>';
		}
		$pagination .= '<li><a href="#">»</a></li>';

		return $pagination;
	}

}