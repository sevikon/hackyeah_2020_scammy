import React from 'react'
import PropTypes from 'prop-types'
import {withStyles} from '@material-ui/core/styles'
import Typography from '@material-ui/core/Typography'
import Modal from '@material-ui/core/Modal'

function getModalStyle() {
  const top = 50
  const left = 50

  return {
    top: `${top}%`,
    left: `${left}%`
  }
}

const styles = theme => ({
  paper: {
    position: 'absolute',
    width: theme.spacing.unit * 50,
    minHeight: theme.spacing.unit * 50,
    backgroundColor: theme.palette.background.paper,
    boxShadow: theme.shadows[5],
    marginLeft: -theme.spacing.unit * 50 / 2,
    marginTop: -theme.spacing.unit * 50 / 2
  }
})

class SimpleModal extends React.Component {
  render() {
    const {classes, className, content, handleClose, open, title, topButtons} = this.props

    return (
      <Modal
        aria-labelledby="simple-modal-title"
        aria-describedby="simple-modal-description"
        open={open || false}
        onClose={handleClose}
        className={`simple-modal-wrapper ${className}`}
      >
        <div style={getModalStyle()} className={`${classes.paper} modal-body`}>
          <div className="modal-wrapper">
            <div className="modal-header">
              <Typography variant="h6" className="modal-title">
                {title}
              </Typography>
              {topButtons && topButtons}
              <button className="close" aria-label="Close" onClick={handleClose}>
                <span>×</span>
              </button>
            </div>
            <Typography variant="subtitle1" className="modal-description">
              {content}
            </Typography>
            <SimpleModalWrapped/>
          </div>
        </div>
      </Modal>
    )
  }
}

SimpleModal.propTypes = {
  classes: PropTypes.object,
  className: PropTypes.string,
  content: PropTypes.object,
  handleClose: PropTypes.func,
  open: PropTypes.bool,
  title: PropTypes.string,
  topButtons: PropTypes.object
}

// We need an intermediary variable for handling the recursive nesting.
const SimpleModalWrapped = withStyles(styles)(SimpleModal)

export default SimpleModalWrapped
