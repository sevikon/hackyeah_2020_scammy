import moment from 'moment-timezone'
import {
  ALL_TIME,
  CURRENT_MONTH,
  CURRENT_WEEK,
  LAST_12_MONTHS,
  LAST_3_MONTHS,
  LAST_WEEK,
  THIS_YEAR, TIME_FORMAT
} from './GlobalConfig'
import {Map} from 'immutable'

export const checkNotNull = (el) => {
  return el !== '' && el !== null && el !== undefined
}

export const getNotNull = (value) => {
  return checkNotNull(value) ? value : ''
}

export const filterEntries = (entries, filter, config = {}) => {
  const {dateField = 'date'} = config
  let filteredEntries = entries
  let start, end

  const format = 'YYYY-MM-DD'

  if (filter.kind === 'year') {
    start = moment().endOf('year')
    end = moment().startOf('year')
    filteredEntries = entries.filter((entry) => entry.get(dateField).format('YYYY') === filter.value)
  } else {
    switch (filter.value) {
      case ALL_TIME: {
        end = moment().format(format)
        filteredEntries = entries.filter((entry) => entry.get(dateField) <= end)
        break
      }
      case THIS_YEAR: {
        filteredEntries = entries.filter((entry) => moment(entry.get(dateField)).format('YYYY') === moment().format('YYYY'))
        break
      }
      case LAST_12_MONTHS: {
        end = moment().format(format)
        start = moment().subtract(12, 'months').format(format)
        filteredEntries = entries.filter((entry) => entry.get(dateField) <= end && entry.get(dateField) >= start)
        break
      }
      case LAST_3_MONTHS: {
        end = moment().format(format)
        start = moment().subtract(3, 'months').format(format)
        filteredEntries = entries.filter((entry) => entry.get(dateField) <= end && entry.get(dateField) >= start)
        break
      }
      case CURRENT_MONTH: {
        end = moment().format(format)
        start = moment().startOf('month').format(format)
        filteredEntries = entries.filter((entry) => entry.get(dateField) <= end && entry.get(dateField) >= start)
        break
      }
      case LAST_WEEK: {
        end = moment().startOf('week').subtract(1, 'minute').format(format)
        start = moment().startOf('week').subtract(1, 'week').format(format)
        filteredEntries = entries.filter((entry) => entry.get(dateField) <= end && entry.get(dateField) >= start)
        break
      }
      case CURRENT_WEEK: {
        end = moment().format(format)
        start = moment().startOf('week').format(format)
        filteredEntries = entries.filter((entry) => entry.get(dateField) <= end && entry.get(dateField) >= start)
        break
      }
    }
  }

  return {
    filteredEntries,
    start,
    end
  }
}

export const fixValidatorErrors = (errors) => {
  let errorsFixed = Map()
  Map(errors).get('items').map((error) => (errorsFixed = errorsFixed.set(error.field, [error.msg])))
  return errorsFixed
}

export const validateURL = (str) => {
  let res = str ? str.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)/g) : null
  return res != null || str === 'http://localhost:3000' || str === 'http://localhost:8000'
}

export const fixNumber = (value, fixed = 2, minus = false) => {
  value = fixDigits(value)
  return (value < 0 && minus ? '-' : '') + parseFloat(value.replace(/[^0-9.]/gi, '')).toFixed(fixed)
}

const fixDigits = (value) => {
  if (value === undefined || value === null) {
    return ''
  }
  if (!(typeof value === 'string' || value instanceof String)) {
    value = value.toString()
  }
  return value
}

export const formatNumber = (value) => {
  value = fixDigits(value)
  return value.replace(/\B(?=(\d{3})+(?!\d))/g, ',')
}

export function getNowUTC() {
  return moment.utc().format(TIME_FORMAT);
}

export function format(date, dateFormat) {
  return moment(date, TIME_FORMAT).format(dateFormat || TIME_FORMAT);
}

export function getTimeAgo(date) {
  const now = moment(new Date()); // today date
  const end = moment(date); // date
  return moment.duration(now.diff(end)).asSeconds();
}

export const inputDateFormat = 'DD-MM-YYYY';
export const inputTimeFormat = 'HH:mm';

export const inputTotalFormat = `${inputDateFormat} ${inputTimeFormat}`;

export const fixInputFormat = date =>
  date ? moment(date, inputTotalFormat).toDate() : date;

export function getMyTimezone() {
  return moment.tz.guess();
}

export function fromUTC(date, timezone, format) {
  return moment
    .utc(date)
    .tz(timezone || getMyTimezone())
    .format(format || TIME_FORMAT);
}
