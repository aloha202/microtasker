<?php echo page_header($page->getName()); ?>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Date</th>
      <th>Image</th>
      <th>Brief</th>
      <th>Text</th>
      <th>Is published</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Meta title</th>
      <th>Meta description</th>
      <th>Meta keywords</th>
      <th>Url</th>
      <th>Redirect301 url</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($blog_posts as $blog_post): ?>
    <tr>
      <td><a href="<?php echo url_for('blog/show?id='.$blog_post->getId()) ?>"><?php echo $blog_post->getId() ?></a></td>
      <td><?php echo $blog_post->getName() ?></td>
      <td><?php echo $blog_post->getDate() ?></td>
      <td><?php echo $blog_post->getImage() ?></td>
      <td><?php echo $blog_post->getBrief() ?></td>
      <td><?php echo $blog_post->getText() ?></td>
      <td><?php echo $blog_post->getIsPublished() ?></td>
      <td><?php echo $blog_post->getCreatedAt() ?></td>
      <td><?php echo $blog_post->getUpdatedAt() ?></td>
      <td><?php echo $blog_post->getMetaTitle() ?></td>
      <td><?php echo $blog_post->getMetaDescription() ?></td>
      <td><?php echo $blog_post->getMetaKeywords() ?></td>
      <td><?php echo $blog_post->getUrl() ?></td>
      <td><?php echo $blog_post->getRedirect301Url() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('blog/new') ?>" class="btn btn-primary">New</a>
