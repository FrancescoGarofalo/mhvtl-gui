
libid()
{
echo '<SELECT name="libid" min="1" type="number" required >'
grep ^Library /etc/mhvtl/device.conf| cut -d ":" -f2| awk '{print $1}'| while read each; do
echo '<OPTION>'$each'</OPTION>'
done
echo '</SELECT>'
}


tape()
{
echo '<SELECT name="tape" type="text" required >'
ls -1 /opt/mhvtl | while read each1; do
echo '<OPTION>'$each1'</OPTION>'
done
echo '</SELECT>'
}


robotdev()
{
echo '<SELECT name="robotdev" min="1" type="number" required >'
lsscsi -g | egrep "mediumx" | awk '{print $NF}' | while read each; do
echo '<OPTION>'$each'</OPTION>'
done
echo '</SELECT>'
}


drivedev()
{
echo '<SELECT name="drivedev" min="1" type="number" required >'
lsscsi -g | egrep "tape" | awk '{print $NF}' | while read each; do
echo '<OPTION>'$each'</OPTION>'
done
echo '</SELECT>'
}


device()
{
echo '<SELECT name="device" min="1" type="number" required >'
lsscsi -g | egrep "tape|mediumx" | awk '{print $NF}' | while read each; do
echo '<OPTION>'$each'</OPTION>'
done
echo '</SELECT>'
}

libdid()
{
echo '<SELECT name="libdid" min="0" type="number" required >'
cut -d ":" /etc/mhvtl/device.conf -f2 | grep CHANNEL | awk '{print $1}' | while read each; do
echo '<OPTION>'$each'</OPTION>'
done
echo '</SELECT>'
}

target()
{
echo '<SELECT name="tid" min="1" type="number" required >'
if [ -f /usr/sbin/tgtadm ]; then
CMD="/usr/sbin/tgtadm"
else
CMD="../stgt.git/usr/tgtadm" 
fi
CHECK=`$CMD --lld iscsi --op show --mode target | grep ^Target| cut -d ":" -f1| awk '{print $NF}'`
if [ -z "$CHECK" ] ; then
echo '<OPTION>'1'</OPTION>'
else
$CMD --lld iscsi --op show --mode target | grep ^Target| cut -d ":" -f1| awk '{print $NF}' | sort -r | while read each; do
echo '<OPTION>'$each'</OPTION>'
done
fi
echo '</SELECT>'
}

nexttarget()
{
echo '<SELECT name="tid" min="1" type="number" required >'
if [ -f /usr/sbin/tgtadm ]; then
CMD="/usr/sbin/tgtadm"
else
CMD="../stgt.git/usr/tgtadm"
fi

CHECK=`$CMD --lld iscsi --op show --mode target | grep ^Target| cut -d ":" -f1| tail -1 | awk '{print $NF}'`
if [ -z "$CHECK" ] ; then
echo '<OPTION>'1'</OPTION>'
else
$CMD --lld iscsi --op show --mode target | grep ^Target| cut -d ":" -f1| tail -1 | awk '{print $NF}' | sort -r | while read each; do
newvalue=$(($each+1))
echo '<OPTION>'$newvalue'</OPTION>'
done
fi
echo '</SELECT>'
}

lun()
{
echo '<SELECT name="lun" min="1" type="number" required >'
if [ -f /usr/sbin/tgtadm ]; then
CMD="/usr/sbin/tgtadm"
else
CMD="../stgt.git/usr/tgtadm"
fi

CHECK=`$CMD --lld iscsi --op show --mode target | awk "/^Target $1: iqn/,/ACL/"| grep LUN| cut -d ":" -f2| grep -v "0"`
if [ -z "$CHECK" ] ; then
echo '<OPTION>'1'</OPTION>'
echo '</SELECT>'
else

$CMD --lld iscsi --op show --mode target | awk "/^Target $1: iqn/,/ACL/"| grep LUN| cut -d ":" -f2| grep -v "0"| sort -r | while read each; do
echo '<OPTION>'$each'</OPTION>'
done

echo '</SELECT>'

fi

}


nlun()
{
echo '<SELECT name="lun" min="1" type="number" required >'
if [ -f /usr/sbin/tgtadm ]; then
CMD="/usr/sbin/tgtadm"
else
CMD="../stgt.git/usr/tgtadm"
fi

CHECK=`$CMD --lld iscsi --op show --mode target | awk "/^Target $1: iqn/,/ACL/"| grep LUN| cut -d ":" -f2| grep -v "0"`
if [ -z "$CHECK" ] ; then
echo '<OPTION>'1'</OPTION>'
echo '</SELECT>'
else

$CMD --lld iscsi --op show --mode target | awk "/^Target $1: iqn/,/ACL/"| grep LUN| cut -d ":" -f2| grep -v "0"| sort -r| head -1 | while read each; do
newvalue=$(($each+1))
echo '<OPTION>'$newvalue'</OPTION>'
done

echo '</SELECT>'

fi
}


$1 $2