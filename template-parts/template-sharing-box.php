<?php $postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>

<span class="sharingButtons">
	<ul>
		<li><a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fa-brands fa-square-facebook"></i></a></li>
		<li><a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this"><i class="fa-brands fa-square-twitter"></i></a></li>
		
		<li><a target="_blank" class="share-button share-linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $postUrl; ?>" title="Share on LinkedIn"><i class="fa-brands fa-linkedin"></i></a></li>
		<li><a href="mailto:?subject=I wanted you to see this event&amp;body=Check out this event <?php echo $postUrl; ?>" title="Share by Email"><i class="fa-solid fa-envelope"></i></a></li>
	</ul>
</span>
							
							
							
