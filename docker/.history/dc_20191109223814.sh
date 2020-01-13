#! /bin/bash

red=31
green=32
yellow=33
blue=34

function cecho {
    color=$1
    shift
    echo -e "\033[${color}m$@\033[m"
}

function usage {
  cecho $green cat <<EOF
$(basename ${0}) is a tool for ...

Usage:
  $(basename ${0}) [command] [<options>]

Options:
  --version, -v     print $(basename ${0}) version
  --help, -h        print this
EOF
}

function version {
  cecho $green echo "$(basename ${0}) version 0.0.1 "
}

case ${1} in

    nginx:start)
        start
    ;;

    stop)
        stop
    ;;

    restart)
        start && stop
    ;;

    help|--help|-h)
        usage
    ;;

    version|--version|-v)
        version
    ;;
    
    *)
        echo "[ERROR] Invalid subcommand '${1}'"
        usage
        exit 1
    ;;
esac


