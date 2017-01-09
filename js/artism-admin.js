jQuery(document).ready(function() {
    jQuery( '.datepicker' ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "-200:+0"
    });

    var addButton = document.getElementById( 'primary-image-upload-button');
    var addButtonComplementary = document.getElementById( 'complementary-image-upload-button');
    var addButtonSecondComplementary = document.getElementById( 'second-complementary-image-upload-button');

    var deleteButton = document.getElementById( 'primary-image-delete-button');
    var deleteButtonComplementary = document.getElementById( 'complementary-image-delete-button');
    var deleteButtonSecondComplementary = document.getElementById( 'second-complementary-image-delete-button');

    var img = document.getElementById( 'primary-image-tag');
    var imgComplementary = document.getElementById( 'complementary-image-tag');
    var imgSecondComplementary = document.getElementById( 'second-complementary-image-tag');

    var hidden = document.getElementById( 'primary-image-hidden-field');
    var hiddenComplementary = document.getElementById( 'complementary-image-hidden-field');
    var hiddenSecondComplementary = document.getElementById( 'second-complementary-image-hidden-field');

    var primaryImageUploader = wp.media({
      title: 'Select a Primary Image',
      button: {
        text: 'Use this Image'
      },
      multiple: 'false'
    });
    var complementaryImageUploader = wp.media({
      title: 'Select a Complementary Image',
      button: {
        text: 'Use this Image'
      },
      multiple: 'false'
    });
    var secondComplementaryImageUploader = wp.media({
      title: 'Select a Second Complementary Image',
      button: {
        text: 'Use this Image'
      },
      multiple: 'false'
    });

    addButton.addEventListener( 'click', function() {
        if ( primaryImageUploader ) {
          primaryImageUploader.open();
        }
    });

    addButtonComplementary.addEventListener( 'click', function() {
        if ( complementaryImageUploader ) {
          complementaryImageUploader.open();
        }
    });
    addButtonSecondComplementary.addEventListener( 'click', function() {
        if ( secondComplementaryImageUploader ) {
          secondComplementaryImageUploader.open();
        }
    });


    primaryImageUploader.on( 'select', function() {
        var attachment = primaryImageUploader.state().get('selection').first().toJSON();
        console.log(attachment);
        img.setAttribute( 'src', attachment.url );
        if (attachment.sizes.thumbnail == null) {
          hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url }]) );
        } else if (attachment.sizes.medium == null) {
          hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url, thumbnailUrl: attachment.sizes.thumbnail.url }]) );
        }  else if (attachment.sizes.large == null) {
          hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url, thumbnailUrl: attachment.sizes.thumbnail.url, mediumUrl: attachment.sizes.medium.url }]) );
        } else {
          hidden.setAttribute( 'value', JSON.stringify( [{ id: attachment.id, url: attachment.url, thumbnailUrl: attachment.sizes.thumbnail.url, mediumUrl: attachment.sizes.medium.url, largeUrl: attachment.sizes.large.url }]) );
        }
        toggleVisibility( 'ADD' );
    });

    complementaryImageUploader.on( 'select', function() {
        var attachmentComplementary = complementaryImageUploader.state().get('selection').first().toJSON();
        console.log(attachmentComplementary);
        imgComplementary.setAttribute( 'src', attachmentComplementary.url );
        if (attachmentComplementary.sizes.thumbnail == null) {
          hiddenComplementary.setAttribute( 'value', JSON.stringify( [{ id: attachmentComplementary.id, url: attachmentComplementary.url }]) );
        } else if (attachmentComplementary.sizes.medium == null) {
          hiddenComplementary.setAttribute( 'value', JSON.stringify( [{ id: attachmentComplementary.id, url: attachmentComplementary.url, thumbnailUrl: attachmentComplementary.sizes.thumbnail.url }]) );
        }  else if (attachmentComplementary.sizes.large == null) {
          hiddenComplementary.setAttribute( 'value', JSON.stringify( [{ id: attachmentComplementary.id, url: attachmentComplementary.url, thumbnailUrl: attachmentComplementary.sizes.thumbnail.url, mediumUrl: attachmentComplementary.sizes.medium.url }]) );
        } else {
          hiddenComplementary.setAttribute( 'value', JSON.stringify( [{ id: attachmentComplementary.id, url: attachmentComplementary.url, thumbnailUrl: attachmentComplementary.sizes.thumbnail.url, mediumUrl: attachmentComplementary.sizes.medium.url, largeUrl: attachmentComplementary.sizes.large.url }]) );
        }
        toggleVisibilityComplementary( 'ADD' );
    });

    secondComplementaryImageUploader.on( 'select', function() {
        var attachmentSecondComplementary = secondComplementaryImageUploader.state().get('selection').first().toJSON();
        console.log(attachmentSecondComplementary);
        imgSecondComplementary.setAttribute( 'src', attachmentSecondComplementary.url );
        if (attachmentSecondComplementary.sizes.thumbnail == null) {
          hiddenSecondComplementary.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecondComplementary.id, url: attachmentSecondComplementary.url }]) );
        } else if (attachmentSecondComplementary.sizes.medium == null) {
          hiddenSecondComplementary.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecondComplementary.id, url: attachmentSecondComplementary.url, thumbnailUrl: attachmentSecondComplementary.sizes.thumbnail.url }]) );
        }  else if (attachmentSecondComplementary.sizes.large == null) {
          hiddenSecondComplementary.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecondComplementary.id, url: attachmentSecondComplementary.url, thumbnailUrl: attachmentSecondComplementary.sizes.thumbnail.url, mediumUrl: attachmentSecondComplementary.sizes.medium.url }]) );
        } else {
          hiddenSecondComplementary.setAttribute( 'value', JSON.stringify( [{ id: attachmentSecondComplementary.id, url: attachmentSecondComplementary.url, thumbnailUrl: attachmentSecondComplementary.sizes.thumbnail.url, mediumUrl: attachmentSecondComplementary.sizes.medium.url, largeUrl: attachmentSecondComplementary.sizes.large.url }]) );
        }
        toggleVisibilitySecondComplementary( 'ADD' );
    });

    deleteButton.addEventListener( 'click', function() {
        img.removeAttribute( 'src' );
        hidden.removeAttribute( 'value' );
        toggleVisibility( 'DELETE' );
    });

    deleteButtonComplementary.addEventListener( 'click', function() {
        imgComplementary.removeAttribute( 'src' );
        hiddenComplementary.removeAttribute( 'value' );
        toggleVisibilityComplementary( 'DELETE' );
    });

    deleteButtonSecondComplementary.addEventListener( 'click', function() {
        imgSecondComplementary.removeAttribute( 'src' );
        hiddenSecondComplementary.removeAttribute( 'value' );
        toggleVisibilitySecondComplementary( 'DELETE' );
    });

    var toggleVisibility = function( action ) {
        if ( 'ADD' === action ) {
            addButton.style.display = 'none';
            deleteButton.style.display = '';
            img.setAttribute( 'style', 'max-width: 400px; width: 100%' );
        }

        if ( 'DELETE' === action ) {
            addButton.style.display = '';
            deleteButton.style.display = 'none';
            img.removeAttribute('style');
        }
    };

    var toggleVisibilityComplementary = function( action ) {
        if ( 'ADD' === action ) {
            addButtonComplementary.style.display = 'none';
            deleteButtonComplementary.style.display = '';
            imgComplementary.setAttribute( 'style', 'max-width: 400px; width: 100%' );
        }

        if ( 'DELETE' === action ) {
            addButtonComplementary.style.display = '';
            deleteButtonComplementary.style.display = 'none';
            imgComplementary.removeAttribute('style');
        }
    };

    var toggleVisibilitySecondComplementary = function( action ) {
        if ( 'ADD' === action ) {
            addButtonSecondComplementary.style.display = 'none';
            deleteButtonSecondComplementary.style.display = '';
            imgSecondComplementary.setAttribute( 'style', 'max-width: 400px; width: 100%' );
        }

        if ( 'DELETE' === action ) {
            addButtonSecondComplementary.style.display = '';
            deleteButtonSecondComplementary.style.display = 'none';
            imgSecondComplementary.removeAttribute('style');
        }
    };

    window.addEventListener( 'DOMContentLoaded', function() {
      if ( "" === artismImageUpload.primaryImageData || 0 === artismImageUpload.primaryImageData.length) {
        toggleVisibility( 'DELETE' );
    } else {
        img.setAttribute( 'src', artismImageUpload.primaryImageData );
        hidden.setAttribute( 'value', JSON.stringify([ artismImageUpload.primaryImageData ]) );
        toggleVisibility( 'ADD' );
    }
  });

    window.addEventListener( 'DOMContentLoaded', function() {
        if ( "" === artismImageUpload.complementaryImageData || 0 === artismImageUpload.complementaryImageData.length) {
          toggleVisibilityComplementary( 'DELETE' );
      } else {
          imgComplementary.setAttribute( 'src', artismImageUpload.complementaryImageData );
          hiddenComplementary.setAttribute( 'value', JSON.stringify([ artismImageUpload.complementaryImageData ]) );
          toggleVisibilityComplementary( 'ADD' );
      }
    });

    window.addEventListener( 'DOMContentLoaded', function() {
        if ( "" === artismImageUpload.secondComplementaryImageData || 0 === artismImageUpload.secondComplementaryImageData.length) {
          toggleVisibilitySecondComplementary( 'DELETE' );
      } else {
          imgSecondComplementary.setAttribute( 'src', artismImageUpload.secondComplementaryImageData );
          hiddenSecondComplementary.setAttribute( 'value', JSON.stringify([ artismImageUpload.secondComplementaryImageData ]) );
          toggleVisibilitySecondComplementary( 'ADD' );
      }
    });
});
