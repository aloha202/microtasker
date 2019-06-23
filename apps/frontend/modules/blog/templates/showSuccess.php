<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $blog_post->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $blog_post->getName() ?></td>
    </tr>
    <tr>
      <th>Date:</th>
      <td><?php echo $blog_post->getDate() ?></td>
    </tr>
    <tr>
      <th>Image:</th>
      <td><?php echo $blog_post->getImage() ?></td>
    </tr>
    <tr>
      <th>Brief:</th>
      <td><?php echo $blog_post->getBrief() ?></td>
    </tr>
    <tr>
      <th>Text:</th>
      <td><?php echo $blog_post->getText() ?></td>
    </tr>
    <tr>
      <th>Is published:</th>
      <td><?php echo $blog_post->getIsPublished() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $blog_post->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $blog_post->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Meta title:</th>
      <td><?php echo $blog_post->getMetaTitle() ?></td>
    </tr>
    <tr>
      <th>Meta description:</th>
      <td><?php echo $blog_post->getMetaDescription() ?></td>
    </tr>
    <tr>
      <th>Meta keywords:</th>
      <td><?php echo $blog_post->getMetaKeywords() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td><?php echo $blog_post->getUrl() ?></td>
    </tr>
    <tr>
      <th>Redirect301 url:</th>
      <td><?php echo $blog_post->getRedirect301Url() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('blog/index') ?>">List</a>
